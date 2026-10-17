<x-admin-dashboard-layout title="Tags">
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

        .panel {
            background: var(--bg-color);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        /* ---------- Add tag ---------- */
        .add-tag-row {
            display: flex;
            gap: 10px;
            padding: 20px 22px;
        }
        .add-tag-row input {
            flex: 1;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 10px 12px;
            font-size: 14px;
            outline: none;
        }
        .add-tag-row input:focus { border-color: var(--accent-color); }
        .add-tag-row button {
            background: var(--accent-color);
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            white-space: nowrap;
        }
        .add-tag-row button:hover { background: #e34a4a; }

        /* ---------- Tag cloud ---------- */
        .tag-cloud {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            padding: 24px 22px 28px 22px;
        }

        .tag-chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #f6f6f5;
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 8px 14px;
            font-weight: 500;
            color: var(--text-color);
            transition: border-color 0.15s;
        }
        .tag-chip:hover { border-color: var(--accent-color); }
        .tag-chip .count { color: var(--muted-text); font-size: 0.85em; }
        .tag-chip .remove { color: var(--muted-text); cursor: pointer; font-size: 0.85em; margin-left: 2px; }
        .tag-chip .remove:hover { color: var(--accent-color); }

        /* Size tiers by usage frequency */
        .tag-chip.xl { font-size: 20px; }
        .tag-chip.lg { font-size: 17px; }
        .tag-chip.md { font-size: 15px; }
        .tag-chip.sm { font-size: 13px; }

        /* ---------- Table view ---------- */
        .tag-table { width: 100%; border-collapse: collapse; }
        .tag-table th {
            text-align: left;
            font-size: 12px;
            font-weight: 500;
            color: var(--muted-text);
            padding: 12px 22px;
            border-bottom: 1px solid var(--border-color);
        }
        .tag-table td {
            padding: 12px 22px;
            border-bottom: 1px solid var(--border-color);
            font-size: 14px;
        }
        .tag-table tr:last-child td { border-bottom: none; }
        .tag-name-cell { font-weight: 600; }
        .tag-name-cell::before { content: "#"; color: var(--muted-text); font-weight: 400; }

        .row-actions { display: flex; gap: 14px; font-size: 12px; font-weight: 600; justify-content: flex-end; }
        .row-actions .edit { color: var(--text-color); cursor: pointer; }
        .row-actions .delete { color: var(--accent-color); cursor: pointer; }
        .row-actions span:hover { text-decoration: underline; }

        .panel-header { padding: 20px 22px 0 22px; }
        .panel-header h2 { font-family: 'Playfair Display', serif; font-size: 18px; font-weight: 600; }
        .panel-header p { font-size: 13px; color: var(--muted-text); margin-top: 4px; }

        @media (max-width: 720px) {
            .sidebar { display: none; }
            .content { padding: 24px 18px 40px 18px; }
            .topbar { padding: 20px 18px; }
            .add-tag-row { flex-direction: column; }
        }
    </style>
    </x-slot:slot2>
     <!-- Main -->
        <div class="main">
            <div class="topbar">
                <div>
                    <h1>Tags</h1>
                    <div class="subline">Fine-grained labels readers can browse by.</div>
                </div>
            </div>

            <div class="content">
                <div class="panel">
                    <div class="add-tag-row">
                        <form action="{{route('admin::tag.store')}}" method="post" style="display:flex; width:100%; gap:10px;">
                            @csrf
                            <input value="{{old('name')}}" autocomplete="off" name="name" type="text" placeholder="New tag name">
                            <button type="submit">Add tag</button>
                        </form>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-header">
                        <h2>All tags</h2>
                        <p>Sized by how often each one is used — click to see tagged posts.</p>
                    </div>
                    <div class="tag-cloud">
                        @forelse ($tags as $tag)
                        <a href="#" class="tag-chip xl lg md sm">{{$tag->name}} <span class="count">{{$tag->posts_count}}</span><span class="remove">✕</span></a>
                        @empty
                        no tags
                        @endforelse
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-header">
                        <h2>Manage tags</h2>
                    </div>
                    <table class="tag-table">
                        <thead>
                            <tr>
                                <th>Tag</th>
                                <th>Posts</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $tag)
                            <tr>
                                <td class="tag-name-cell">{{$tag->name}}</td>
                                <td>{{$tag->posts_count}}  posts</td>
                                <td><div class="row-actions"><a href ="{{route('admin::tag.show', $tag)}}" class="edit">Rename</a>
                                    <form action="{{route('admin::tag.delete', $tag)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you Sure?')" type="submit" class="delete" style="background: none; border:none;">Delete</button>
                                    </form>
                                </div></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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