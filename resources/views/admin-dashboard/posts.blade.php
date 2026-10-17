
<x-admin-dashboard-layout title="Posts">
    
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

        .topbar-actions { display: flex; align-items: center; gap: 14px; }

        .search-box {
            display: flex;
            align-items: center;
            gap: 8px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 8px 12px;
            background: var(--bg-color);
        }
        .search-box svg { width: 15px; height: 15px; color: var(--muted-text); flex-shrink: 0; }
        .search-box input { border: none; outline: none; font-size: 13px; width: 170px; }

        .btn-new-post {
            background: var(--accent-color);
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: background 0.2s;
        }
        .btn-new-post:hover { background: #e34a4a; }
        .btn-new-post svg { width: 15px; height: 15px; }

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

        /* ---------- Panel / table ---------- */
        .panel {
            background: var(--bg-color);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            overflow: hidden;
        }

        .post-table { width: 100%; border-collapse: collapse; }

        .post-table th {
            text-align: left;
            font-size: 12px;
            font-weight: 500;
            color: var(--muted-text);
            padding: 12px 22px;
            border-bottom: 1px solid var(--border-color);
        }

        .post-table td {
            padding: 14px 22px;
            border-bottom: 1px solid var(--border-color);
            font-size: 14px;
            vertical-align: middle;
        }

        .post-table tr:last-child td { border-bottom: none; }
        .post-table th.checkbox-col, .post-table td.checkbox-col { padding-right: 0; width: 36px; }
        .post-table input[type="checkbox"] { width: 15px; height: 15px; accent-color: var(--accent-color); cursor: pointer; }

        .post-title-cell { font-weight: 600; }
        .post-title-cell .sub { display: block; font-weight: 400; font-size: 12px; color: var(--muted-text); margin-top: 2px; }

        .status-pill {
            font-size: 12px;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 20px;
            display: inline-block;
        }
        .status-published { color: var(--good); background: var(--good-soft); }
        .status-draft { color: #a3894f; background: #fbf3e4; }
        .status-scheduled { color: #4c6ef5; background: #edf1ff; }

        .cat-pill {
            font-size: 12px;
            font-weight: 500;
            color: #555;
            background: #f4f4f4;
            padding: 3px 10px;
            border-radius: 20px;
            display: inline-block;
        }

        .row-more { color: var(--muted-text); cursor: pointer; text-align: right; }
        .row-more:hover { color: var(--text-color); }

        /* ---------- Pagination ---------- */
        .pagination {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 22px;
            font-size: 13px;
            color: var(--muted-text);
        }
        .page-btns { display: flex; gap: 6px; }
        .page-btns button {
            border: 1px solid var(--border-color);
            background: var(--bg-color);
            border-radius: 6px;
            width: 30px;
            height: 30px;
            font-size: 13px;
            cursor: pointer;
            color: var(--text-color);
        }
        .page-btns button.active { background: var(--text-color); color: #fff; border-color: var(--text-color); }
        .page-btns button:hover:not(.active) { border-color: var(--accent-color); color: var(--accent-color); }
        .range-select {
            font-size: 13px;
            font-weight: 500;
            color: var(--text-color);
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 5px;
            position: relative;
            top: -2.5px;
            background: var(--bg-color);
            cursor: pointer;
        }

        @media (max-width: 720px) {
            .sidebar { display: none; }
            .content { padding: 24px 18px 40px 18px; }
            .topbar { padding: 20px 18px; flex-direction: column; align-items: flex-start; gap: 14px; }
            .search-box input { width: 120px; }
        }
    </style>
</x-slot:slot2>
    <!-- Main -->
        <div class="main">
            <div class="topbar">
                <div>
                    <h1>Posts</h1>
                    <div class="subline">Everything you've published, scheduled or left as a draft.</div>
                </div>
                <div class="topbar-actions">
                    <div class="search-box">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        <input type="text" placeholder="Search posts">
                    </div>
                    <a href="{{route('admin::post.add')}}" class="btn-new-post" style="padding: 7px 18px;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        New post
                    </a>
                </div>
            </div>
            <div class="content">
                <div class="filter-tabs">
                    <a href="{{route('admin::post')}}" class="{{!request()->query('status') ? 'active' : ''}}">All <span class="count">{{$allCount}}</span></a>
                    <a href="{{route('admin::post', ['status' => 'published'])}}" class="{{request()->query('status')=='published' ? 'active' : ''}} ">Published <span class="count">{{$publishedPosts}}</span></a>

                    <a href="{{route('admin::post', ['status' => 'draft'])}}" class="{{request()->query('status')=='draft' ? 'active' : ''}} ">Drafts <span class="count">{{$draftPosts}}</span></a>
                </div>

                <div class="panel">
                    <table class="post-table">
                        <thead>
                            <tr>
                                <th class="checkbox-col"><input type="checkbox"></th>
                                <th>Post</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $p)
                            <tr>
                                <td class="checkbox-col"><input type="checkbox"></td>
                                <td class="post-title-cell">{{str($p->title)->words(5)}}<span class="sub">by {{$p->user->name}}</span></td>
                                <td><span class="cat-pill">{{$p->category->name}}</span></td>
                                <td><span class="status-pill {{$p->status == 'published' ? 'status-published' : 'status-draft'}}" style="text-transform: capitalize;">{{$p->status}}</span></td>
                                <td>{{$p->created_at->format('M d, Y')}}</td>
                                <td class="row-more">
                                    <a href="" class="btn-new-post" style="background-color: #507f9b;" title="Edit Post"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg></a>
                                    <form action="{{route('admin::post.delete', $p)}}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you Sure?')" type="submit" class="btn-new-post" style="background-color: #f5965a;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                        </svg></button>
                                    </form>
                                    <form action="{{route('admin::post.updateStatus', $p)}}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <select onchange="this.form.submit()" class="range-select" name="status">
                                            <option {{$p->status == 'draft' ? 'selected' : ''}}>Draft</option>
                                            <option {{$p->status == 'published' ? 'selected' : ''}}>Published</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                    <div style="padding: 0 30px 30px 30px;">
                        {{$posts->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
        @if (session('success'))
            <script async>
                qnShowToast({ title: 'Saved', message: '{{ session("success") }}', type: 'success' });
            </script>
        @endif
        @error('name')
            <script async>
                qnShowToast({ title: 'Something went wrong', message: '{{ $message }}', type: 'error' });
            </script>
        @enderror
</x-admin-dashboard-layout>