<?php use App\core\Classes\Flash; ?>
<div id="toast-container" aria-live="polite" aria-atomic="true" style="position: fixed; right: 20px; bottom: 20px; z-index: 9999; pointer-events: none;">
    <div class="toast toast--error" role="status" aria-live="assertive" aria-atomic="true"
        style="pointer-events: auto; min-width:280px; max-width:380px; background:#fff; border-left:4px solid #e57373;
                    box-shadow:0 8px 30px rgba(0,0,0,0.08); padding:12px 14px; border-radius:10px; display:flex; gap:12px;
                    align-items:flex-start; opacity:0; transform:translateY(10px); transition:opacity .25s ease, transform .25s ease;
                    font-family: system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true"
            style="flex:0 0 auto; margin-top:2px;">
            <circle cx="12" cy="12" r="10" fill="#fdecea" />
            <path d="M12 7v6" stroke="#b71c1c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M12 17h.01" stroke="#b71c1c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>

        <div style="flex:1; min-width:0;">
            <div style="font-weight:600; color:#b71c1c; margin-bottom:4px; font-size:14px;">Error</div>
            <div style="color:#111827; font-size:13px; line-height:1.3; word-break:break-word;">
                <?= htmlspecialchars(Flash::get('failed')) ?>
            </div>
        </div>

        <button type="button" class="toast-close" aria-label="Dismiss"
            style="background:transparent;border:0;color:#6b7280;cursor:pointer;font-size:18px;line-height:1;padding:0 6px;">
            &times;
        </button>
    </div>
</div>

<script>
    (function() {
        var container = document.getElementById('toast-container');
        if (!container) return;
        var toast = container.querySelector('.toast');
        var btn = container.querySelector('.toast-close');
        // show
        requestAnimationFrame(function() {
            toast.style.opacity = '1';
            toast.style.transform = 'translateY(0)';
        });
        // auto-dismiss
        var dismissMs = 5000;
        var timer = setTimeout(dismiss, dismissMs);

        function dismiss() {
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(10px)';
            setTimeout(function() {
                if (container && container.parentNode) container.parentNode.removeChild(container);
            }, 300);
            clearTimeout(timer);
        }

        btn.addEventListener('click', function(e) {
            e.preventDefault();
            dismiss();
        });

        // pause on hover
        container.addEventListener('mouseenter', function() {
            clearTimeout(timer);
        });
        container.addEventListener('mouseleave', function() {
            timer = setTimeout(dismiss, 2500);
        });
    })();
</script>