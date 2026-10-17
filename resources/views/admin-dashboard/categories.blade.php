<x-admin-dashboard-layout title="Categories">
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

        /* ---------- Layout: form + table ---------- */
        .row-2col {
            display: grid;
            grid-template-columns: 1fr 1.7fr;
            gap: 20px;
            align-items: start;
        }

        .panel {
            background: var(--bg-color);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            overflow: hidden;
        }

        .panel-header { padding: 20px 22px 0 22px; }
        .panel-header h2 { font-family: 'Playfair Display', serif; font-size: 18px; font-weight: 600; }
        .panel-header p { font-size: 13px; color: var(--muted-text); margin-top: 4px; }

        /* ---------- Add category form ---------- */
        .form-body { padding: 18px 22px 22px 22px; }
        .field-label { font-size: 13px; font-weight: 600; margin-bottom: 6px; display: block; }
        .field-input {
            width: 100%;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 10px 12px;
            font-size: 14px;
            outline: none;
            margin-bottom: 14px;
        }
        .field-input:focus { border-color: var(--accent-color); }
        .field-hint { font-size: 12px; color: var(--muted-text); margin: -10px 0 14px 0; }
        .btn-primary-full {
            width: 100%;
            background: var(--accent-color);
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 11px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }
        .btn-primary-full:hover { background: #e34a4a; }

        /* ---------- Categories table ---------- */
        .cat-table { width: 100%; border-collapse: collapse; }
        .cat-table th {
            text-align: left;
            font-size: 12px;
            font-weight: 500;
            color: var(--muted-text);
            padding: 12px 22px;
            border-bottom: 1px solid var(--border-color);
        }
        .cat-table td {
            padding: 14px 22px;
            border-bottom: 1px solid var(--border-color);
            font-size: 14px;
            vertical-align: middle;
        }
        .cat-table tr:last-child td { border-bottom: none; }

        .cat-name-cell { font-weight: 600; display: flex; align-items: center; gap: 10px; }
        .cat-dot { width: 9px; height: 9px; border-radius: 50%; flex-shrink: 0; }
        .cat-slug { font-size: 12px; color: var(--muted-text); }
        .cat-count { font-size: 13px; color: var(--muted-text); }

        .row-actions { display: flex; gap: 14px; font-size: 12px; font-weight: 600; justify-content: flex-end; }
        .row-actions .edit { color: var(--text-color); cursor: pointer; }
        .row-actions .delete { color: var(--accent-color); cursor: pointer; }
        .row-actions span:hover { text-decoration: underline; }

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
        .user-dropdown a + a { border-top: 1px solid var(--border-color); }

        @media (max-width: 900px) {
            .row-2col { grid-template-columns: 1fr; }
        }
        @media (max-width: 720px) {
            .sidebar { display: none; }
            .content { padding: 24px 18px 40px 18px; }
            .topbar { padding: 20px 18px; }
        }
    </style>
    </x-slot:slot2>
         <!-- Main -->
        <div class="main">
            <div class="topbar">
                <div>
                    <h1>Categories</h1>
                    <div class="subline">Group your posts under broad topics.</div>
                </div>
            </div>

            <div class="content">
                <div class="row-2col">
                    <div class="panel">
                        <div class="panel-header">
                            <h2>Add category</h2>
                            <p>Categories are broad — most blogs use 5 to 10.</p>
                        </div>
                        <div class="form-body">
                            <form action="{{route('admin::categories.add')}}" method="POST">
                                @csrf
                            <label class="field-label">Name</label>
                            <input value="{{old('name')}}" class="field-input" name="name" type="text" placeholder="e.g. Culture">
                            @error('name')
                            <div class="field-hint" style="color: red">{{$message}}</div>
                            @enderror
                            <button type="submit" class="btn-primary-full">Add category</button>
                            </form>
                        </div>
                    </div>
                    <div class="panel">
                        <table class="cat-table">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Slug</th>
                                    <th>Posts</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $color = sprintf('#%06X', random_int(0, 0xFFFFFF));
                                @endphp

                                @forelse ($categories as $category)
                                <tr>
                                    <td class="cat-name-cell"><span class="cat-dot" style="background: {{$color}}"></span>{{$category->name}}</td>
                                    <td class="cat-slug" style="text-transform: lowercase">/{{$category->name}}</td>
                                    <td class="cat-count">{{$category->posts_count}}</td>
                                    <td><div class="row-actions"><a href="{{route('admin::category.show', $category)}}" class="edit">Edit</a>
                                        <form action="{{route('admin::category.delete', $category)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure?')" class="delete" style="background: none; border:none;" type="submit">Delete</button>
                                        </form></div></td>
                                </tr>
                                 @php
                                    $color = sprintf('#%06X', random_int(0, 0xFFFFFF));
                                @endphp
                                @empty
                                 <td class="cat-name-cell"><span class="cat-dot" style="background:#4c6ef5;"></span>No categories Found</td>
                                    <td class="cat-slug"></td>
                                    <td class="cat-count"></td>
                                    <td></td>
                                @endforelse
                            </tbody>
                        </table>
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