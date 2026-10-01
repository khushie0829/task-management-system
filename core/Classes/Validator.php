<?php

namespace App\core\Classes;

class Validator
{
    protected static array $errors = [];

    /**
     * Validate data with rules.
     * Rules example: ['email' => ['required', 'email'], 'password' => ['required', 'min:8']]
     */
    public static function make(array $data, array $rules): bool
    {
        self::$errors = [];

        foreach ($rules as $field => $fieldRules) {
            $value = $data[$field] ?? null;

            foreach ($fieldRules as $rule) {
                // Handle rules with parameters (e.g., min:8)
                [$ruleName, $params] = self::parseRule($rule);

                $method = 'validate' . ucfirst($ruleName);

                if (method_exists(__CLASS__, $method)) {
                    $result = self::$method($field, $value, $params, $data);
                    if (!$result) {
                        // Stop at first error for this field and rule
                        break;
                    }
                } else {
                    throw new \Exception("Validation rule $ruleName does not exist.");
                }
            }
        }

        return empty(self::$errors);
    }

    /**
     * Parse rule string with parameters (e.g., min:8 -> ['min', ['8']])
     */
    protected static function parseRule(string $rule): array
    {
        if (strpos($rule, ':') !== false) {
            [$ruleName, $paramString] = explode(':', $rule, 2);
            $params = explode(',', $paramString);
        } else {
            $ruleName = $rule;
            $params = [];
        }
        return [$ruleName, $params];
    }

    /**
     * Return errors array
     */
    public static function errors(): array
    {
        return self::$errors;
    }

    /**
     * Add error message for a field
     */
    protected static function addError(string $field, string $message)
    {
        self::$errors[$field][] = $message;
    }

    // ========== Validation Methods ==========

    protected static function validateRequired(string $field, $value, array $params, array $data): bool
    {
        if (is_null($value) || (is_string($value) && trim($value) === '') || (is_array($value) && empty($value))) {
            self::addError($field, "$field is required.");
            return false;
        }
        return true;
    }

    protected static function validateEmail(string $field, $value, array $params, array $data): bool
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            self::addError($field, "$field must be a valid email.");
            return false;
        }
        return true;
    }

    protected static function validateMin(string $field, $value, array $params, array $data): bool
    {
        $min = (int)($params[0] ?? 0);

        if (is_string($value) && mb_strlen($value) < $min) {
            self::addError($field, "$field must be at least $min characters.");
            return false;
        }

        if (is_numeric($value) && $value < $min) {
            self::addError($field, "$field must be at least $min.");
            return false;
        }

        if (is_array($value) && count($value) < $min) {
            self::addError($field, "$field must have at least $min items.");
            return false;
        }

        return true;
    }

    protected static function validateMax(string $field, $value, array $params, array $data): bool
    {
        $max = (int)($params[0] ?? 0);

        if (is_string($value) && mb_strlen($value) > $max) {
            self::addError($field, "$field must not exceed $max characters.");
            return false;
        }

        if (is_numeric($value) && $value > $max) {
            self::addError($field, "$field must not exceed $max.");
            return false;
        }

        if (is_array($value) && count($value) > $max) {
            self::addError($field, "$field must not have more than $max items.");
            return false;
        }

        return true;
    }

    protected static function validateConfirmed(string $field, $value, array $params, array $data): bool
    {
        $confirmationField = $field . '_confirmation';

        if (!isset($data[$confirmationField]) || $data[$confirmationField] !== $value) {
            self::addError($field, "$field confirmation does not match.");
            return false;
        }

        return true;
    }

    protected static function validateRegex(string $field, $value, array $params, array $data): bool
    {
        $pattern = $params[0] ?? '';

        if ($pattern === '' || !preg_match($pattern, $value)) {
            self::addError($field, "$field format is invalid.");
            return false;
        }

        return true;
    }

    protected static function validateIn(string $field, $value, array $params, array $data): bool
    {
        if (!in_array($value, $params, true)) {
            self::addError($field, "$field must be one of: " . implode(', ', $params));
            return false;
        }

        return true;
    }

    protected static function validateNumeric(string $field, $value, array $params, array $data): bool
    {
        if (!is_numeric($value)) {
            self::addError($field, "$field must be a numeric value.");
            return false;
        }
        return true;
    }

    protected static function validateDateTime(string $field, $value, array $params, array $data): bool
    {
        // Accept common datetime formats including HTML5 datetime-local (e.g. 2025-10-22T14:30)
        $formats = [
            'Y-m-d H:i',
            'Y-m-d\TH:i',
            'Y-m-d H:i:s',
            'Y-m-d\TH:i:s',
        ];

        foreach ($formats as $format) {
            $d = \DateTime::createFromFormat($format, $value);
            if ($d && $d->format($format) === $value) {
                return true;
            }
        }

        self::addError($field, "$field must be a valid date time.");
        return false;
    }

    protected static function validateDate(string $field, $value, array $params, array $data): bool
    {
        if (!\DateTime::createFromFormat('Y-m-d', $value)) {
            self::addError($field, "$field must be a valid date.");
            return false;
        }
        return true;
    }

    protected static function validateDateFormat(string $field, $value, array $params, array $data): bool
    {
        $format = $params[0] ?? 'Y-m-d H:i:s';
        $d = \DateTime::createFromFormat($format, $value);
        if (!($d && $d->format($format) === $value)) {
            self::addError($field, "$field must match the format $format.");
            return false;
        }
        return true;
    }

    protected static function validateBoolean(string $field, $value, array $params, array $data): bool
    {
        if (!is_bool($value) && !in_array($value, [0, 1, '0', '1'], true)) {
            self::addError($field, "$field must be a boolean value.");
            return false;
        }
        return true;
    }

    protected static function validateArray(string $field, $value, array $params, array $data): bool
    {
        if (!is_array($value)) {
            self::addError($field, "$field must be an array.");
            return false;
        }
        return true;
    }

    protected static function validateString(string $field, $value, array $params, array $data): bool
    {
        if (!is_string($value)) {
            self::addError($field, "$field must be a string.");
            return false;
        }
        return true;
    }

    protected static function validatePhone(string $field, $value, array $params, array $data): bool
    {
        // Remove spaces, dashes, parentheses, and leading zeros
        $value = preg_replace('/[\s\-\(\)]/', '', $value);

        // Regex pattern for Indian mobile numbers

        // Simple phone number validation (you can enhance this as needed)
        $pattern = '/^\+?[0-9]{7,15}$/';
        // Accept Indian phone numbers:
        // - 10 digits starting with 6-9
        // - optional country code +91 or 91, or leading 0
        // - optional separator (space or hyphen) after country code
        $pattern = '/^(?:\+91[\-\s]?|91[\-\s]?|0)?[6-9][0-9]{9}$/';
        $pattern = '/^(?:\+91|91)?[6-9]\d{9}$/';
        if (!preg_match($pattern, $value)) {
            self::addError($field, "$field must be a valid phone number.");
            return false;
        }
        return true;
    }

    // Add more validators as needed...
}
