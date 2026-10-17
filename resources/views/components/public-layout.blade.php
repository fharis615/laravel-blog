<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qurno</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
   
    {{$slot2}}

    <style>
        .qn-toast-container {
        position: fixed;
        top: 24px;
        right: 24px;
        display: flex;
        flex-direction: column;
        gap: 12px;
        z-index: 999;
    }

    .qn-toast {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        background: #ffffff;
        border: 1px solid #ececea;
        border-left: 3px solid #f55a5a;
        border-radius: 10px;
        padding: 14px 16px;
        min-width: 280px;
        max-width: 360px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.08);
        font-family: 'Inter', sans-serif;
        opacity: 0;
        transform: translateX(20px);
        animation: qn-toast-in 0.3s ease forwards;
    }

    .qn-toast.qn-toast-success { border-left-color: #3a8f6d; }
    .qn-toast.qn-toast-error { border-left-color: #f55a5a; }
    .qn-toast.qn-toast-info { border-left-color: #4c6ef5; }

    .qn-toast-icon {
        width: 20px;
        height: 20px;
        flex-shrink: 0;
        margin-top: 1px;
        color: #f55a5a;
    }
    .qn-toast-success .qn-toast-icon { color: #3a8f6d; }
    .qn-toast-error .qn-toast-icon { color: #f55a5a; }
    .qn-toast-info .qn-toast-icon { color: #4c6ef5; }

    .qn-toast-body { flex: 1; min-width: 0; }

    .qn-toast-title {
        font-family: 'Playfair Display', serif;
        font-size: 14px;
        font-weight: 600;
        color: #181818;
        margin-bottom: 2px;
    }

    .qn-toast-message {
        font-size: 13px;
        color: #8a8a8a;
        line-height: 1.4;
    }

    .qn-toast-close {
        background: none;
        border: none;
        cursor: pointer;
        color: #8a8a8a;
        font-size: 15px;
        line-height: 1;
        padding: 2px;
        flex-shrink: 0;
        transition: color 0.15s;
    }
    .qn-toast-close:hover { color: #181818; }

    .qn-toast-progress {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 2px;
        background: #f55a5a;
        border-bottom-left-radius: 10px;
        animation: qn-toast-progress 4s linear forwards;
    }
    .qn-toast { position: relative; overflow: hidden; }
    .qn-toast-success .qn-toast-progress { background: #3a8f6d; }
    .qn-toast-info .qn-toast-progress { background: #4c6ef5; }

    @keyframes qn-toast-in {
        to { opacity: 1; transform: translateX(0); }
    }

    @keyframes qn-toast-out {
        to { opacity: 0; transform: translateX(20px); }
    }

    @keyframes qn-toast-progress {
        from { width: 100%; }
        to { width: 0%; }
    }

    @media (max-width: 480px) {
        .qn-toast-container { left: 16px; right: 16px; top: 16px; }
        .qn-toast { max-width: none; min-width: 0; }
    }
        </style>
    <script>

        const qnIcons = {
        success: '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline>',
        error: '<circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line>',
        info: '<circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line>'
    };


        function qnShowToast({ title = '', message = '', type = 'info', duration = 4000 } = {}) {
        const container = document.getElementById('qnToastContainer');

        const toast = document.createElement('div');
        toast.className = `qn-toast qn-toast-${type}`;
        toast.innerHTML = `
            <svg class="qn-toast-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">${qnIcons[type] || qnIcons.info}</svg>
            <div class="qn-toast-body">
                ${title ? `<div class="qn-toast-title">${title}</div>` : ''}
                <div class="qn-toast-message">${message}</div>
            </div>
            <button class="qn-toast-close">✕</button>
            <div class="qn-toast-progress" style="animation-duration:${duration}ms;"></div>
        `;

        container.appendChild(toast);

        const remove = () => {
            toast.style.animation = 'qn-toast-out 0.25s ease forwards';
            setTimeout(() => toast.remove(), 250);
        };

        toast.querySelector('.qn-toast-close').addEventListener('click', remove);
        const timer = setTimeout(remove, duration);

    }
    </script>
</head>
<body>
<div class="qn-toast-container" id="qnToastContainer"></div>
    <header>
        <div class="container nav-wrapper">
            <a href="#" class="logo">Qurno</a>
            <nav>
                <ul class="nav-links">
                    <li><a href="{{route('index')}}">Home</a></li>
                    <li><a href="">Categories</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
            <div class="nav-actions">
                <div class="search-wrapper">
                    <input type="text" class="search-input" id="searchInput" placeholder="Search posts...">
                    <span class="search-label" id="searchLabel"><svg xmlns="http://www.w3.org/2000/svg" style="position: relative; top:2px; width:15px; height:15px;" width="15" height="15" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
</svg> Search</span>
                </div>
            </div>
        </div>
    </header>

    {{$slot}}

     <footer>
        <div class="container footer-content">
            <div>
                <span><strong>PlatofTheme</strong> © 2023 Qurno. All rights reserved.</span>
            </div>
            <div class="footer-links">
                <a href="#">Privacy Policy</a>
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 11a9 9 0 0 1 9 9"></path><path d="M4 4a16 16 0 0 1 16 16"></path><circle cx="5" cy="19" r="1"></circle></svg> RSS</a>
                <a href="#">404 Page</a>
            </div>
        </div>
    </footer>

   {{$slot3}}

</body>
</html>
