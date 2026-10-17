
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
        .filter-tabs button {
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
        .filter-tabs button.active {
            color: var(--text-color);
            border-bottom-color: var(--accent-color);
            font-weight: 600;
        }
        .filter-tabs button .count { color: var(--muted-text); font-weight: 400; }

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

        @media (max-width: 720px) {
            .sidebar { display: none; }
            .content { padding: 24px 18px 40px 18px; }
            .topbar { padding: 20px 18px; flex-direction: column; align-items: flex-start; gap: 14px; }
            .search-box input { width: 120px; }
        }
    </style>

    
    <style>
        :root {
            --ap-bg-color: #ffffff;
            --ap-bg-page: #fbfaf8;
            --ap-text-color: #181818;
            --ap-muted-text: #8a8a8a;
            --ap-accent-color: #f55a5a;
            --ap-accent-soft: #fdf5f5;
            --ap-border-color: #ececea;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--ap-bg-page);
            color: var(--ap-text-color);
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
        }

        .ap-page {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 48px 20px 80px 20px;
        }

        .ap-page-header { margin-bottom: 28px; }
        .ap-page-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 600;
        }
        .ap-page-header p {
            font-size: 13px;
            color: var(--ap-muted-text);
            margin-top: 6px;
        }

        .ap-form {
            background: var(--ap-bg-color);
            border: 1px solid var(--ap-border-color);
            border-radius: 10px;
            padding: 32px;
        }

        .ap-field { margin-bottom: 24px; }
        .ap-field:last-child { margin-bottom: 0; }

        .ap-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
        }
        .ap-label .ap-optional {
            font-weight: 400;
            color: var(--ap-muted-text);
        }

        .ap-hint {
            font-size: 12px;
            color: var(--ap-muted-text);
            margin-top: 6px;
        }

        .ap-input,
        .ap-select,
        .ap-textarea {
            width: 100%;
            border: 1px solid var(--ap-border-color);
            border-radius: 6px;
            padding: 11px 14px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            color: var(--ap-text-color);
            outline: none;
            background: var(--ap-bg-color);
            transition: border-color 0.15s;
        }
        .ap-input:focus,
        .ap-select:focus,
        .ap-textarea:focus { border-color: var(--ap-accent-color); }

        .ap-title-input {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            font-weight: 600;
            padding: 12px 14px;
        }

        .ap-slug-wrap {
            display: flex;
            align-items: center;
            border: 1px solid var(--ap-border-color);
            border-radius: 6px;
            overflow: hidden;
        }
        .ap-slug-prefix {
            padding: 11px 12px;
            background: #f6f6f5;
            font-size: 13px;
            color: var(--ap-muted-text);
            border-right: 1px solid var(--ap-border-color);
            white-space: nowrap;
        }
        .ap-slug-wrap input {
            border: none;
            flex: 1;
            padding: 11px 12px;
            font-size: 14px;
            outline: none;
        }
        .ap-slug-wrap:focus-within { border-color: var(--ap-accent-color); }

        .ap-select {
            appearance: none;
            -webkit-appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%238a8a8a' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
            padding-right: 36px;
            cursor: pointer;
        }

        .ap-textarea {
            resize: vertical;
            min-height: 220px;
            line-height: 1.7;
        }

        /* ---------- Cover image upload box ---------- */
        .ap-cover-box {
            position: relative;
            width: 100%;
            height: 220px;
            border: 1.5px dashed var(--ap-border-color);
            border-radius: 10px;
            background: var(--ap-accent-soft);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            overflow: hidden;
            transition: border-color 0.2s, background 0.2s;
        }
        .ap-cover-box:hover {
            border-color: var(--ap-accent-color);
        }
        .ap-cover-box.ap-has-image {
            border-style: solid;
            background: #000;
        }

        .ap-cover-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            color: var(--ap-muted-text);
            pointer-events: none;
            text-align: center;
            padding: 0 20px;
        }
        .ap-cover-placeholder svg {
            width: 30px;
            height: 30px;
            color: var(--ap-accent-color);
        }
        .ap-cover-placeholder .ap-cover-title {
            font-size: 14px;
            font-weight: 600;
            color: var(--ap-text-color);
        }
        .ap-cover-placeholder .ap-cover-sub {
            font-size: 12px;
        }

        .ap-cover-preview {
            display: none;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .ap-cover-box.ap-has-image .ap-cover-preview { display: block; }
        .ap-cover-box.ap-has-image .ap-cover-placeholder { display: none; }

        .ap-cover-overlay {
            display: none;
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.45);
            color: #fff;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 600;
            opacity: 0;
            transition: opacity 0.2s;
        }
        .ap-cover-box.ap-has-image:hover .ap-cover-overlay {
            display: flex;
            opacity: 1;
        }

        .ap-cover-remove {
            display: none;
            position: absolute;
            top: 10px;
            right: 10px;
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: rgba(0,0,0,0.55);
            color: #fff;
            border: none;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 14px;
            z-index: 2;
        }
        .ap-cover-box.ap-has-image .ap-cover-remove { display: flex; }
        .ap-cover-remove:hover { background: var(--ap-accent-color); }

        .ap-cover-input { display: none; }

        /* ---------- Tags (checkbox multi-select) ---------- */
        .ap-tags-select {
            position: relative;
        }

        .ap-tags-select-box {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
            border: 1px solid var(--ap-border-color);
            border-radius: 6px;
            padding: 8px 10px;
            min-height: 46px;
            cursor: pointer;
            transition: border-color 0.15s;
        }
        .ap-tags-select-box:hover,
        .ap-tags-select.ap-open .ap-tags-select-box { border-color: var(--ap-accent-color); }

        .ap-tags-placeholder {
            font-size: 14px;
            color: var(--ap-muted-text);
        }

        .ap-tag-chip {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--ap-accent-soft);
            color: var(--ap-accent-color);
            font-size: 13px;
            font-weight: 600;
            padding: 5px 8px 5px 12px;
            border-radius: 20px;
        }
        .ap-tag-chip .ap-tag-remove {
            cursor: pointer;
            font-size: 13px;
            line-height: 1;
            width: 16px;
            height: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        .ap-tag-chip .ap-tag-remove:hover { background: rgba(245,90,90,0.2); }

        .ap-tags-caret {
            margin-left: auto;
            width: 16px;
            height: 16px;
            color: var(--ap-muted-text);
            flex-shrink: 0;
            transition: transform 0.15s;
        }
        .ap-tags-select.ap-open .ap-tags-caret { transform: rotate(180deg); }

        .ap-tags-panel {
            display: none;
            position: absolute;
            top: calc(100% + 6px);
            left: 0;
            right: 0;
            background: var(--ap-bg-color);
            border: 1px solid var(--ap-border-color);
            border-radius: 8px;
            box-shadow: 0 10px 28px rgba(0,0,0,0.1);
            z-index: 20;
            overflow: hidden;
        }
        .ap-tags-select.ap-open .ap-tags-panel { display: block; }

        .ap-tags-search {
            width: 100%;
            border: none;
            border-bottom: 1px solid var(--ap-border-color);
            padding: 11px 14px;
            font-size: 13px;
            outline: none;
            font-family: 'Inter', sans-serif;
        }

        .ap-tags-list {
            max-height: 220px;
            overflow-y: auto;
            padding: 6px;
        }

        .ap-tags-option {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 10px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }
        .ap-tags-option:hover { background: var(--ap-accent-soft); }

        .ap-tags-option input[type="checkbox"] {
            width: 15px;
            height: 15px;
            accent-color: var(--ap-accent-color);
            cursor: pointer;
        }

        .ap-tags-option-empty {
            padding: 14px;
            font-size: 13px;
            color: var(--ap-muted-text);
            text-align: center;
        }

        /* ---------- Actions ---------- */
        .ap-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 32px;
        }

        .ap-btn-ghost {
            background: none;
            border: 1px solid var(--ap-border-color);
            color: var(--ap-text-color);
            border-radius: 6px;
            padding: 11px 20px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }
        .ap-btn-ghost:hover { border-color: var(--ap-text-color); }

        .ap-btn-primary {
            background: var(--ap-accent-color);
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 11px 22px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }
        .ap-btn-primary:hover { background: #e34a4a; }

        @media (max-width: 600px) {
            .ap-form { padding: 22px; }
            .ap-actions { flex-direction: column-reverse; }
            .ap-actions button { width: 100%; }
        }
    </style>
</x-slot:slot2>
    <div class="ap-page">
        
        <div class="ap-page-header">
            <h1>New post</h1>
            <p>Fill in the details below and publish whenever you're ready.</p>
        </div>

        <form class="ap-form" id="apPostForm" method="POST" action="{{route('admin::post.store')}}" enctype="multipart/form-data">
            @csrf
            <!-- Cover image -->
            <div class="ap-field">
                <label class="ap-label">Cover image <span class="ap-optional">(optional)</span></label>
                <div class="ap-cover-box" id="apCoverBox">
                    <div class="ap-cover-placeholder">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                        <span class="ap-cover-title">Click to upload a cover image</span>
                        <span class="ap-cover-sub">PNG or JPG, up to 5MB</span>
                    </div>
                    <img class="ap-cover-preview" id="apCoverPreview" alt="Cover preview">
                    <div class="ap-cover-overlay">Click to change image</div>
                    <button type="button" class="ap-cover-remove" id="apCoverRemove" title="Remove image">✕</button>
                </div>
                <input type="file" name="cover_image" class="ap-cover-input" id="apCoverInput">
                @error('cover_image')
                <div class="ap-hint" style="color: red;">{{$message}}</div>
                @enderror
            </div>

            <!-- Title -->
            <div class="ap-field">
                <label class="ap-label" for="apTitle">Title</label>
                <input value="{{old('title')}}" name="title" type="text" id="apTitle" class="ap-input ap-title-input" placeholder="Give your post a title">
                @error('title')
                <div class="ap-hint" style="color: red;">{{$message}}</div>
                @enderror
            </div>

            <!-- Slug -->
            <div class="ap-field">
                <label class="ap-label" for="apSlug">Slug</label>
                <div class="ap-slug-wrap">
                    <span class="ap-slug-prefix">qurno.com/blog/</span>
                    <input value="{{old('slug')}}" name="slug" type="text" id="apSlug" placeholder="post-url-slug">
                </div>
                <div class="ap-hint">Auto-filled from the title — edit it any time.</div>
                @error('slug')
                <div class="ap-hint" style="color: red;">{{$message}}</div>
                @enderror
            </div>

            <!-- Category -->
            <div class="ap-field">
                <label class="ap-label" for="apCategory">Category</label>
                <select name="category_id" id="apCategory" class="ap-select">
                    <option value="">Select a category</option>
                    @foreach ($category as $c)
                    <option {{old('category_id')==$c->id ? 'selected' : ''}} value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="ap-hint" style="color: red;">{{$message}}</div>
                @enderror
            </div>

            <!-- Tags -->
            <div class="ap-field">
                <label class="ap-label">Tags</label>

                <div class="ap-tags-select" id="apTagsSelect">
                    <div class="ap-tags-select-box" id="apTagsSelectBox">
                        <span class="ap-tags-placeholder" id="apTagsPlaceholder">Select tags</span>
                        <svg class="ap-tags-caret" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </div>

                    <div class="ap-tags-panel">
                        <input type="text" class="ap-tags-search" id="apTagsSearch" placeholder="Search tags...">
                        <div class="ap-tags-list" id="apTagsList">
                            <!-- options rendered by JS from apPreloadedTags -->
                        </div>
                    </div>
                </div>

                <!-- Real form value — a hidden multi-select kept in sync with the checkboxes above -->
                <select id="apTagsHiddenSelect" name="tags[]" multiple style="display:none;"></select>
                <select id="apTagsHiddenSelectName" name="tagNames[]" multiple style="display:none;"></select>

                <div class="ap-hint">Pick as many tags as apply — no free typing, just what's already on the blog.</div>
                @error('tags')
                <div class="ap-hint" style="color: red;">{{$message}}</div>
                @enderror
            </div>

            <!-- Excerpt-->
            <div class="ap-field">
                <label class="ap-label" for="apExcerpt">Excerpt</label>
                <input value="{{old('excerpt')}}" name="excerpt" type="text" id="apExcerpt" class="ap-input ap-title-input" placeholder="Give your post a excerpt">
                @error('excerpt')
                <div class="ap-hint" style="color: red;">{{$message}}</div>
                @enderror
            </div>

            <!-- Body -->
            <div class="ap-field">
                <label class="ap-label" for="apBody">Body</label>
                <div id="editor" class="ap-textarea" style="height: 300px;">{!! old('body') !!}</div>
                <input type="hidden" name="body" id="apBody">
                @error('body')
                <div class="ap-hint" style="color: red;">{{$message}}</div>
                @enderror
            </div>
            <input type="hidden" name="status" value="published" id="postStatus">
            <div class="ap-actions">
                <button type="button" id="Draft" class="ap-btn-ghost">Save as draft</button>
                <button type="submit" id="Published" class="ap-btn-primary">Publish post</button>
            </div>
        </form>
    </div>
    <script>
        const draft = document.getElementById('Draft');

        draft.addEventListener('click', ()=>{
            document.getElementById('postStatus').value = 'draft';
            setTimeout(() => {
                document.getElementById('Published').click();
            }, 500);
        });
        // ---------- Cover image upload + preview ----------
        const apCoverBox = document.getElementById('apCoverBox');
        const apCoverInput = document.getElementById('apCoverInput');
        const apCoverPreview = document.getElementById('apCoverPreview');
        const apCoverRemove = document.getElementById('apCoverRemove');

        apCoverBox.addEventListener('click', () => apCoverInput.click());

        apCoverInput.addEventListener('change', () => {
            const file = apCoverInput.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = (e) => {
                apCoverPreview.src = e.target.result;
                apCoverBox.classList.add('ap-has-image');
            };
            reader.readAsDataURL(file);
        });

        apCoverRemove.addEventListener('click', (e) => {
            e.stopPropagation();
            apCoverInput.value = '';
            apCoverPreview.src = '';
            apCoverBox.classList.remove('ap-has-image');
        });

        // ---------- Slug auto-fill from title ----------
        const apTitle = document.getElementById('apTitle');
        const apSlug = document.getElementById('apSlug');
        let apSlugTouched = false;

        function apSlugify(text) {
            return text
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
        }

        apTitle.addEventListener('input', () => {
            if (!apSlugTouched) {
                apSlug.value = apSlugify(apTitle.value);
            }
        });

        apSlug.addEventListener('input', () => { apSlugTouched = true; });

        // ---------- Tags: checkbox multi-select ----------
        // This is where you drop in your own preloaded tags later.
        const apPreloadedTags = @json($label);

        const apPreloadedTagsIds = @json($labelIds);

        const apTagsSelect = document.getElementById('apTagsSelect');
        const apTagsSelectBox = document.getElementById('apTagsSelectBox');
        const apTagsPlaceholder = document.getElementById('apTagsPlaceholder');
        const apTagsPanel = apTagsSelect.querySelector('.ap-tags-panel');
        const apTagsList = document.getElementById('apTagsList');
        const apTagsSearch = document.getElementById('apTagsSearch');
        const apTagsHiddenSelect = document.getElementById('apTagsHiddenSelect');
        const apTagsHiddenSelectName = document.getElementById('apTagsHiddenSelectName');

        const apSelectedTags = new Set();
        @if(old('tagNames'))
        @foreach (old('tagNames') as $t)
            apSelectedTags.add('{{$t}}');
        @endforeach
        @endif

        function oldTagsCheck(){
            // Keep the hidden select (the real submitted value) in sync
            [...apTagsHiddenSelect.options].forEach(opt => {
                opt.selected = apSelectedTags.has(opt.innerHTML);
            });
            [...apTagsHiddenSelectName.options].forEach(opt => {
                opt.selected = apSelectedTags.has(opt.value);
            });
            apTagsHiddenSelect.dispatchEvent(new Event('change'));
            apTagsHiddenSelectName.dispatchEvent(new Event('change'));
            apRenderSelectedChips();
        }
        // Build the hidden <select> options (the actual form value) once.
            var num = 0;
        apPreloadedTagsIds.forEach(tag => {
            const opt = document.createElement('option');
            opt.value = tag;
            opt.textContent = apPreloadedTags[num];
            apTagsHiddenSelect.appendChild(opt);
            num++
        });
        apPreloadedTags.forEach(tag => {
            const opt = document.createElement('option');
            opt.value = tag;
            opt.textContent = tag;
            apTagsHiddenSelectName.appendChild(opt);
        });
        function apRenderTagOptions(filter = '') {
            apTagsList.innerHTML = '';
            const matches = apPreloadedTags.filter(tag =>
                tag.toLowerCase().includes(filter.trim().toLowerCase())
            );

            if (!matches.length) {
                apTagsList.innerHTML = '<div class="ap-tags-option-empty">No matching tags</div>';
                return;
            }

            matches.forEach(tag => {
                const row = document.createElement('label');
                row.className = 'ap-tags-option';
                row.innerHTML = `
                    <input type="checkbox" value="${tag}" ${apSelectedTags.has(tag) ? 'checked' : ''}>
                    <span>${tag}</span>
                `;
                row.querySelector('input').addEventListener('change', (e) => {
                    apToggleTag(tag, e.target.checked);
                });
                apTagsList.appendChild(row);
            });
        }

        function apToggleTag(tag, isSelected) {
            if (isSelected) {
                apSelectedTags.add(tag);
            } else {
                apSelectedTags.delete(tag);
            }
            // Keep the hidden select (the real submitted value) in sync
            [...apTagsHiddenSelect.options].forEach(opt => {
                opt.selected = apSelectedTags.has(opt.innerHTML);
            });
            [...apTagsHiddenSelectName.options].forEach(opt => {
                opt.selected = apSelectedTags.has(opt.value);
            });
            apTagsHiddenSelect.dispatchEvent(new Event('change'));
            apTagsHiddenSelectName.dispatchEvent(new Event('change'));
            apRenderSelectedChips();
        }

        function apRenderSelectedChips() {
            apTagsSelectBox.querySelectorAll('.ap-tag-chip').forEach(chip => chip.remove());
            if (apSelectedTags.size === 0) {
                apTagsPlaceholder.style.display = 'inline';
            } else {
                apTagsPlaceholder.style.display = 'none';
                apSelectedTags.forEach(tag => {
                    const chip = document.createElement('span');
                    chip.className = 'ap-tag-chip';
                    chip.innerHTML = `${tag}<span class="ap-tag-remove" data-tag="${tag}">✕</span>`;
                    apTagsSelectBox.insertBefore(chip, apTagsSelectBox.lastElementChild);
                });
            }
        }

        apTagsSelectBox.addEventListener('click', (e) => {
            if (e.target.classList.contains('ap-tag-remove')) {
                e.stopPropagation();
                apToggleTag(e.target.dataset.tag, false);
                apRenderTagOptions(apTagsSearch.value);
                return;
            }
            apTagsSelect.classList.toggle('ap-open');
            if (apTagsSelect.classList.contains('ap-open')) {
                apTagsSearch.focus();
            }
        });

        apTagsSearch.addEventListener('input', () => apRenderTagOptions(apTagsSearch.value));

        document.addEventListener('click', (e) => {
            if (!apTagsSelect.contains(e.target)) {
                apTagsSelect.classList.remove('ap-open');
            }
        });
        oldTagsCheck();
        apRenderTagOptions();
        apRenderSelectedChips();

        
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.snow.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.min.js"></script>

<script>
    const quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ header: [2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ list: 'ordered' }, { list: 'bullet' }],
                ['link', 'image', 'blockquote'],
                ['clean']
            ]
        }
    });

    // If editing an existing post, load its saved HTML into the editor
    @if(isset($post))
        quill.root.innerHTML = @json($post->body);
    @endif

    @if (old('body'))
        quill.root.innerHTML = @json(old('body'));
    @endif


        document.getElementById('apPostForm').addEventListener('submit', ()=>{
            document.querySelector('#apBody').value = quill.root.innerHTML;
        });
</script>
</x-admin-dashboard-layout>