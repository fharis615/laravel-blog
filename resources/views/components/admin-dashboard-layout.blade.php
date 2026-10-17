<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title ?? 'Qurno Dashboard'}}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">

    <style>
        .sidebar-user {
        position: relative;
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 6px 10px;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.15s;
    }
    .sidebar-user:hover { background: rgba(255,255,255,0.05); }

    .sidebar-user img { width: 32px; height: 32px; border-radius: 50%; }
    .sidebar-user .name { font-size: 13px; font-weight: 600; color: #fff; }
    .sidebar-user .role { font-size: 12px; color: #6e6a63; }

    .user-dropdown {
        display: none;
        position: absolute;
        bottom: 115%;
        left: 0;
        right: 0;
        background: #fff;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.2);
        overflow: hidden;
        z-index: 30;
    }
    .user-dropdown.active { display: block; }

    .user-dropdown a {
        display: block;
        padding: 11px 16px;
        font-size: 13px;
        font-weight: 500;
        color: var(--text-color);
        transition: background 0.2s, color 0.2s;
    }
    .user-dropdown a:hover {
        background-color: var(--accent-soft);
        color: var(--accent-color);
    }
    .user-dropdown button
     {
        display: block;
        width: 100%;
        text-align: left;
        padding: 11px 16px;
        font-size: 13px;
        font-weight: 500;
        color: var(--text-color);
        background: none;
        border: none; border-top: 1px solid var(--border-color);
        transition: background 0.2s, color 0.2s;
    }
    .user-dropdown button:hover {
        background-color: var(--accent-soft);
        color: var(--accent-color);
        cursor: pointer;
    }
    .sidebar{
        max-height: 100vh;
        position: sticky;
        left: 0;
        top: 0;
    }

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
        

    {{$slot2}}
    
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

    // qnShowToast({ title: 'Draft saved', message: 'Your changes were saved automatically.', type: 'success' });
     // qnShowToast({ title: 'Something went wrong', message: 'Could not publish the post.', type: 'error' });
</script>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="qn-toast-container" id="qnToastContainer"></div>

    <div class="app">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-logo">Qurno</div>
            <nav class="sidebar-nav">
                <a href="{{route('admin::dashboard')}}" class="{{request()->routeIs('admin::dashboard') ? 'active' : ''}}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="9"></rect><rect x="14" y="3" width="7" height="5"></rect><rect x="14" y="12" width="7" height="9"></rect><rect x="3" y="16" width="7" height="5"></rect></svg>
                    Overview
                </a>
                <a href="{{route('admin::post')}}" class="{{request()->routeIs('admin::post') ? 'active' : ''}}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"></path><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"></path></svg>
                    Posts
                </a>
                <a href="{{route('admin::comments')}}" class="{{request()->routeIs('admin::comments') ? 'active' : ''}}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                    Comments
                    <span class="badge">6</span>
                </a>
                <a href="{{route('admin::categories')}}" class="{{request()->routeIs('admin::categories') ? 'active' : ''}}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 7a2 2 0 0 1 2-2h4l2 2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7z"></path></svg>
                    Categories
                </a>
                <a href="{{route('admin::tags')}}" class="{{request()->routeIs('admin::tags') ? 'active' : ''}}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.59 13.41 11 3.83A2 2 0 0 0 9.59 3.24L4 3v5.59a2 2 0 0 0 .59 1.41l9.58 9.59a2 2 0 0 0 2.83 0l3.59-3.59a2 2 0 0 0 0-2.83z"></path><circle cx="8" cy="8" r="1.5"></circle></svg>
                    Tags
                </a>
                <div class="sidebar-section-label">Manage</div>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                    Settings
                </a>
            </nav>

            <div class="sidebar-footer">
    <div class="sidebar-user" id="userToggle">
        <img src="{{asset('storage\1.jpg')}}" alt="Thomas">
        <div>
            <div style="text-transform:capitalize" class="name">{{auth()->user()->name}}</div>
            <div class="role">Admin</div>
        </div>
        <div class="user-dropdown" id="userDropdown">
            <a href="{{route('admin::profile.edit')}}">Edit Profile</a>
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit">Log Out</button>
            </form>
        </div>
    </div>
</div>
        </aside>
        {{$slot}}
</div>
        
            <script>
    const userToggle = document.getElementById('userToggle');
    const userDropdown = document.getElementById('userDropdown');

    userToggle.addEventListener('click', (e) => {
        e.stopPropagation();
        userDropdown.classList.toggle('active');
    });

    document.addEventListener('click', (e) => {
        if (!userToggle.contains(e.target)) {
            userDropdown.classList.remove('active');
        }
    });
</script>



    
</body>
</html>
