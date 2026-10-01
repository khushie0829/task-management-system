<?php

namespace App\Controllers;

class BlogController
{
    public function show($id)
    {
        echo "Showing blog post with ID: " . htmlspecialchars($id);
    }
}
