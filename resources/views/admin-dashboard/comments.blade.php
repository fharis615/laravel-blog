<x-admin-dashboard-layout title="Comments">
    <x-slot:slot2>
        <style>
        :root {
            --bg-color: #ffffff;
            --bg-page: #fbfaf8;
            --text-color: #181818;
            --muted-text: #8a8a8a;
            --accent-color: #f55a5a;
            --accent-soft: #fdf5f5;
            --border-color: #ececea;
            --good: #3a8f6d;
            --good-soft: #eef6f2;
            --sidebar-bg: #171512;
            --sidebar-text: #a9a49c;
            --sidebar-text-active: #ffffff;
            --sidebar-border: #2b2824;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-page);
            color: var(--text-color);
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
        }

        a { text-decoration: none; color: inherit; }
        ul { list-style: none; }
        button { font-family: inherit; }

        .app { display: flex; min-height: 100vh; }

        /* ---------- Sidebar ---------- */
        .sidebar {
            width: 240px;
            flex-shrink: 0;
            background: var(--sidebar-bg);
            color: var(--sidebar-text);
            display: flex;
            flex-direction: column;
            padding: 28px 18px;
        }

        .sidebar-logo {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            font-weight: 700;
            color: #fff;
            padding: 0 10px 28px 10px;
        }

        .sidebar-section-label {
            font-size: 12px;
            color: #6e6a63;
            padding: 0 10px;
            margin: 18px 0 8px 0;
        }

        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 10px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 2px;
            transition: background 0.15s, color 0.15s;
        }

        .sidebar-nav svg { width: 17px; height: 17px; flex-shrink: 0; }

        .sidebar-nav a:hover {
            background: rgba(255,255,255,0.05);
            color: var(--sidebar-text-active);
        }

        .sidebar-nav a.active {
            background: rgba(245, 90, 90, 0.15);
            color: var(--sidebar-text-active);
        }

        .sidebar-nav a.active svg { stroke: var(--accent-color); }

        .sidebar-nav .badge {
            margin-left: auto;
            background: var(--accent-color);
            color: #fff;
            font-size: 11px;
            font-weight: 600;
            padding: 1px 7px;
            border-radius: 20px;
        }

        .sidebar-footer {
            margin-top: auto;
            padding-top: 18px;
            border-top: 1px solid var(--sidebar-border);
        }

        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 6px 10px;
        }

        .sidebar-user img { width: 32px; height: 32px; border-radius: 50%; }
        .sidebar-user .name { font-size: 13px; font-weight: 600; color: #fff; }
        .sidebar-user .role { font-size: 12px; color: #6e6a63; }

        /* ---------- Main ---------- */
        .main { flex: 1; min-width: 0; }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 26px 40px;
            border-bottom: 1px solid var(--border-color);
            background: var(--bg-color);
        }

        .topbar h1 { font-family: 'Playfair Display', serif; font-size: 26px; font-weight: 600; }
        .topbar .subline { font-size: 13px; color: var(--muted-text); margin-top: 4px; }

        .content { padding: 32px 40px 60px 40px; }

        /* ---------- Filter tabs ---------- */
        .filter-tabs {
            display: flex;
            gap: 4px;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 20px;
        }
        .filter-tabs a {
            background: none;
            border: none;
            padding: 10px 16px;
            font-size: 14px;
            font-weight: 500;
            color: var(--muted-text);
            cursor: pointer;
            border-bottom: 2px solid transparent;
            margin-bottom: -1px;
        }
        .filter-tabs a.active {
            color: var(--text-color);
            border-bottom-color: var(--accent-color);
            font-weight: 600;
        }
        .filter-tabs a .count { color: var(--muted-text); font-weight: 400; }

        /* ---------- Panel / comment list ---------- */
        .panel {
            background: var(--bg-color);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            overflow: hidden;
        }

        .comment-row {
            display: flex;
            gap: 14px;
            padding: 20px 22px;
            border-bottom: 1px solid var(--border-color);
        }
        .comment-row:last-child { border-bottom: none; }

        .comment-row img { width: 38px; height: 38px; border-radius: 50%; flex-shrink: 0; }

        .comment-body { min-width: 0; flex: 1; }

        .comment-top { display: flex; align-items: center; justify-content: space-between; gap: 12px; }

        .comment-meta { font-size: 14px; font-weight: 600; }
        .comment-meta .on { font-weight: 400; color: var(--muted-text); }
        .comment-date { font-size: 12px; color: var(--muted-text); white-space: nowrap; }

        .comment-text { font-size: 14px; color: #3f3f3f; margin: 6px 0 12px 0; line-height: 1.6; max-width: 640px; }

        .comment-actions { display: flex; gap: 16px; font-size: 12px; font-weight: 600; }
        .comment-actions .approve { color: var(--good); cursor: pointer; }
        .comment-actions .reply { color: var(--muted-text); cursor: pointer; }
        .comment-actions .spam { color: var(--accent-color); cursor: pointer; }
        .comment-actions span:hover { text-decoration: underline; }

        .pill-status {
            font-size: 11px;
            font-weight: 600;
            padding: 3px 9px;
            border-radius: 20px;
        }
        .pill-pending { color: #a3894f; background: #fbf3e4; }
        .pill-approved { color: var(--good); background: var(--good-soft); }
        .pill-spam { color: var(--accent-color); background: var(--accent-soft); }

        @media (max-width: 720px) {
            .sidebar { display: none; }
            .content { padding: 24px 18px 40px 18px; }
            .topbar { padding: 20px 18px; }
            .comment-top { flex-direction: column; align-items: flex-start; gap: 4px; }
        }
    </style>
    </x-slot:slot2> 
 <!-- Main -->
        <div class="main">
            <div class="topbar">
                <div>
                    <h1>Comments</h1>
                    <div class="subline">Moderate what your readers are saying.</div>
                </div>
            </div>

            <div class="content">
                <div class="filter-tabs">
                    <a href="{{route('admin::comments')}}" class="{{!request()->query('status') ? 'active' : ''}}">All <span class="count">{{$totalComments}}</span></a>
                    <a href="{{route('admin::comments', ['status' => 'pending'])}}" class="{{request()->query('status') == 'pending' ? 'active' : ''}}">Pending <span class="count">{{$pendingComments}}</span></an>
                    <a href="{{route('admin::comments', ['status' => 'approved'])}}" class="{{request()->query('status') == 'approved' ? 'active' : ''}}">Approved <span class="count">{{$approvedComments}}</span></a>
                    <a href="{{route('admin::comments', ['status' => 'spam'])}}" class="{{request()->query('status') == 'spam' ? 'active' : ''}}">Spam <span class="count">{{$spamComments}}</span></a>
                </div>

                <div class="panel">
                    @forelse ($comments as $c)
                        
                    
                    <div class="comment-row">
                        <div class="comment-body">
                            <div class="comment-top">
                                <div class="comment-meta" style="text-transform: capitalize;">{{$c->name}} <span class="on">on "{{str($c->post->title)->words(5, '...')}}"</span></div>
                                <div style="display:flex; align-items:center; gap:8px;">
                                    <span class="pill-status {{$c->status=='pending' ? 'pill-pending' : ($c->status=='approved' ? 'pill-approved' : ($c->status=='spam' ? 'pill-spam' : ''))}}" style="text-transform: capitalize;">{{$c->status}}</span>
                                    <span class="comment-date">{{$c->smartTime($c->created_at)}} ago</span>
                                </div>
                            </div>
                            <p class="comment-text">{{$c->body}}.</p>
                            <div class="comment-actions">
                                <form action="{{route('admin::comments.updateStatus', $c)}}" method="post">
                                    @csrf
                                    <input type="hidden" value="approved" name="status" id="commentStatus">
                                    <button id="commentApprove" type="submit" class="approve">Approve</button>
                                    <button style="margin-left: 10px;" id="commentSpam" type="button" class="spam">Mark as spam</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    
                    @empty
                        <div class="comment-row">
                        <div class="comment-body">
                            <p class="comment-text">No Comments</p>
                        </div>
                    </div>
                    @endforelse

                    
                </div>
            </div>
        </div>
        <script>
            const commentStatus = document.getElementById('commentStatus');
            const commentApprove = document.getElementById('commentApprove');
            const commentSpam = document.getElementById('commentSpam');
            
            commentSpam.addEventListener('click', ()=>{
                commentStatus.value = 'spam';

                setTimeout(() => {
                    commentApprove.click();
                }, 200);
            });
        </script>

        @if (session('success'))
            <script async>
                qnShowToast({ title: 'Changed Status', message: '{{ session("success") }}', type: 'success' });
            </script>
        @endif
</x-admin-dashboard-layout>