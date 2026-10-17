<x-admin-dashboard-layout title="Dashboard">
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

        .sidebar-user img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
        }

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

        .topbar h1 {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            font-weight: 600;
        }

        .topbar .subline { font-size: 13px; color: var(--muted-text); margin-top: 4px; }

        .topbar-actions { display: flex; align-items: center; gap: 14px; }

        .range-select {
            font-size: 13px;
            font-weight: 500;
            color: var(--text-color);
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 8px 12px;
            background: var(--bg-color);
            cursor: pointer;
        }

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

        /* ---------- Stat cards ---------- */
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: var(--bg-color);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 20px 22px;
        }

        .stat-label {
            font-size: 13px;
            color: var(--muted-text);
            margin-bottom: 10px;
        }

        .stat-row { display: flex; align-items: flex-end; justify-content: space-between; }

        .stat-number {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            font-weight: 600;
        }

        .stat-delta {
            font-size: 12px;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 20px;
            margin-bottom: 4px;
        }

        .stat-delta.up { color: var(--good); background: var(--good-soft); }
        .stat-delta.down { color: var(--accent-color); background: var(--accent-soft); }

        .stat-spark { width: 70px; height: 28px; }

        /* ---------- Two column layout ---------- */
        .row-2col {
            display: grid;
            grid-template-columns: 1.6fr 1fr;
            gap: 20px;
            margin-bottom: 28px;
            align-items: start;
        }

        .panel {
            background: var(--bg-color);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            overflow: hidden;
        }

        .panel-header {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            padding: 20px 22px 0 22px;
        }

        .panel-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 18px;
            font-weight: 600;
        }

        .panel-header .see-all { font-size: 13px; color: var(--accent-color); font-weight: 600; }

        /* ---------- Views chart ---------- */
        .chart-wrap { padding: 10px 22px 22px 22px; }

        .chart-svg { width: 100%; height: 200px; }

        /* ---------- Recent posts table ---------- */
        .post-table { width: 100%; border-collapse: collapse; margin-top: 12px; }

        .post-table th {
            text-align: left;
            font-size: 12px;
            font-weight: 500;
            color: var(--muted-text);
            padding: 10px 22px;
            border-bottom: 1px solid var(--border-color);
        }

        .post-table td {
            padding: 14px 22px;
            border-bottom: 1px solid var(--border-color);
            font-size: 14px;
            vertical-align: middle;
        }

        .post-table tr:last-child td { border-bottom: none; }

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

        .row-more { color: var(--muted-text); cursor: pointer; }
        .row-more:hover { color: var(--text-color); }

        /* ---------- Comments panel ---------- */
        .comment-item {
            display: flex;
            gap: 12px;
            padding: 16px 22px;
            border-bottom: 1px solid var(--border-color);
        }

        .comment-item:last-child { border-bottom: none; }

        .comment-item img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .comment-body { min-width: 0; }
        .comment-meta { font-size: 13px; font-weight: 600; }
        .comment-meta span { font-weight: 400; color: var(--muted-text); }
        .comment-text {
            font-size: 13px;
            color: #4a4a4a;
            margin: 4px 0 8px 0;
            line-height: 1.5;
        }

        .comment-actions { display: flex; gap: 14px; font-size: 12px; font-weight: 600; }
        .comment-actions .approve { color: var(--good); cursor: pointer; }
        .comment-actions .dismiss { color: var(--muted-text); cursor: pointer; }
        .comment-actions span:hover { text-decoration: underline; }

        /* ---------- Draft panel ---------- */
        .draft-panel { padding: 20px 22px 22px 22px; }
        .draft-input {
            width: 100%;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 10px 12px;
            font-size: 14px;
            font-family: 'Playfair Display', serif;
            margin-bottom: 10px;
            outline: none;
        }
        .draft-input:focus { border-color: var(--accent-color); }
        .draft-textarea {
            width: 100%;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 10px 12px;
            font-size: 13px;
            font-family: 'Inter', sans-serif;
            resize: none;
            height: 70px;
            outline: none;
            margin-bottom: 12px;
        }
        .draft-textarea:focus { border-color: var(--accent-color); }
        .draft-save {
            width: 100%;
            background: var(--text-color);
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 10px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }
        .draft-save:hover { background: #000; }

        @media (max-width: 1100px) {
            .stat-grid { grid-template-columns: repeat(2, 1fr); }
            .row-2col { grid-template-columns: 1fr; }
        }

        @media (max-width: 720px) {
            .sidebar { display: none; }
            .content { padding: 24px 18px 40px 18px; }
            .topbar { padding: 20px 18px; }
            .stat-grid { grid-template-columns: 1fr; }
        }
    </style>
    </x-slot:slot2>
<!-- Main -->
        <div class="main">
            <div class="topbar">
                <div>
                    <h1>Good morning, Thomas</h1>
                    <div class="subline">Here's how Qurno is doing this month.</div>
                </div>
                <div class="topbar-actions">
                    <select class="range-select">
                        <option>Last 7 days</option>
                        <option selected>Last 30 days</option>
                        <option>Last 90 days</option>
                    </select>
                    <button class="btn-new-post">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        New post
                    </button>
                </div>
            </div>

            <div class="content">
                <!-- Stat cards -->
                <div class="stat-grid">
                    <div class="stat-card">
                        <div class="stat-label">Total views</div>
                        <div class="stat-row">
                            <div>
                                <div class="stat-number">42.8k</div>
                            </div>
                            <div style="display:flex; flex-direction:column; align-items:flex-end; gap:6px;">
                                <span class="stat-delta up">+12.4%</span>
                                <svg class="stat-spark" viewBox="0 0 70 28"><polyline points="0,22 10,18 20,20 30,12 40,14 50,6 60,9 70,3" fill="none" stroke="#3a8f6d" stroke-width="2"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Published posts</div>
                        <div class="stat-row">
                            <div class="stat-number">86</div>
                            <div style="display:flex; flex-direction:column; align-items:flex-end; gap:6px;">
                                <span class="stat-delta up">+3</span>
                                <svg class="stat-spark" viewBox="0 0 70 28"><polyline points="0,20 10,20 20,17 30,17 40,14 50,14 60,10 70,10" fill="none" stroke="#3a8f6d" stroke-width="2"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Subscribers</div>
                        <div class="stat-row">
                            <div class="stat-number">3,214</div>
                            <div style="display:flex; flex-direction:column; align-items:flex-end; gap:6px;">
                                <span class="stat-delta up">+186</span>
                                <svg class="stat-spark" viewBox="0 0 70 28"><polyline points="0,24 10,20 20,19 30,15 40,13 50,10 60,8 70,4" fill="none" stroke="#3a8f6d" stroke-width="2"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Avg. read time</div>
                        <div class="stat-row">
                            <div class="stat-number">2:41</div>
                            <div style="display:flex; flex-direction:column; align-items:flex-end; gap:6px;">
                                <span class="stat-delta down">-0:08</span>
                                <svg class="stat-spark" viewBox="0 0 70 28"><polyline points="0,6 10,8 20,10 30,9 40,14 50,15 60,19 70,20" fill="none" stroke="#f55a5a" stroke-width="2"/></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart + Comments -->
                <div class="row-2col">
                    <div class="panel">
                        <div class="panel-header">
                            <h2>Views this month</h2>
                            <span class="see-all">Export</span>
                        </div>
                        <div class="chart-wrap">
                            <svg class="chart-svg" viewBox="0 0 600 200" preserveAspectRatio="none">
                                <defs>
                                    <linearGradient id="areaFill" x1="0" y1="0" x2="0" y2="1">
                                        <stop offset="0%" stop-color="#f55a5a" stop-opacity="0.18"/>
                                        <stop offset="100%" stop-color="#f55a5a" stop-opacity="0"/>
                                    </linearGradient>
                                </defs>
                                <line x1="0" y1="50" x2="600" y2="50" stroke="#ececea" stroke-width="1"/>
                                <line x1="0" y1="100" x2="600" y2="100" stroke="#ececea" stroke-width="1"/>
                                <line x1="0" y1="150" x2="600" y2="150" stroke="#ececea" stroke-width="1"/>
                                <polygon points="0,160 30,150 60,155 90,120 120,130 150,100 180,110 210,80 240,95 270,70 300,85 330,60 360,75 390,50 420,65 450,40 480,55 510,35 540,45 570,20 600,30 600,200 0,200"
                                    fill="url(#areaFill)" />
                                <polyline points="0,160 30,150 60,155 90,120 120,130 150,100 180,110 210,80 240,95 270,70 300,85 330,60 360,75 390,50 420,65 450,40 480,55 510,35 540,45 570,20 600,30"
                                    fill="none" stroke="#f55a5a" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-header">
                            <h2>Latest comments</h2>
                            <span class="see-all">See all</span>
                        </div>
                        <div>
                            <div class="comment-item">
                                <img src="https://i.pravatar.cc/150?img=32" alt="">
                                <div class="comment-body">
                                    <div class="comment-meta">Priya N. <span>on "The AGI hype train..."</span></div>
                                    <p class="comment-text">This matches what I'm seeing in my own team's roadmap discussions too.</p>
                                    <div class="comment-actions"><span class="approve">Approve</span><span class="dismiss">Dismiss</span></div>
                                </div>
                            </div>
                            <div class="comment-item">
                                <img src="https://i.pravatar.cc/150?img=45" alt="">
                                <div class="comment-body">
                                    <div class="comment-meta">Daniel K. <span>on "Why developers are so divided..."</span></div>
                                    <p class="comment-text">Would love a follow-up on Gutenberg specifically.</p>
                                    <div class="comment-actions"><span class="approve">Approve</span><span class="dismiss">Dismiss</span></div>
                                </div>
                            </div>
                            <div class="comment-item">
                                <img src="https://i.pravatar.cc/150?img=23" alt="">
                                <div class="comment-body">
                                    <div class="comment-meta">Elena M. <span>on "Everything you wanted to know..."</span></div>
                                    <p class="comment-text">Solid overview, though I think the Horizon Worlds bit is dated already.</p>
                                    <div class="comment-actions"><span class="approve">Approve</span><span class="dismiss">Dismiss</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Posts + Draft -->
                <div class="row-2col">
                    <div class="panel">
                        <div class="panel-header">
                            <h2>Recent posts</h2>
                            <span class="see-all">View all</span>
                        </div>
                        <table class="post-table">
                            <thead>
                                <tr>
                                    <th>Post</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Views</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="post-title-cell">The AGI hype train is hit heavy traffic<span class="sub">by Thomas · Machine, AGI</span></td>
                                    <td><span class="status-pill status-published">Published</span></td>
                                    <td>Oct 06, 2023</td>
                                    <td>6,204</td>
                                    <td class="row-more">···</td>
                                </tr>
                                <tr>
                                    <td class="post-title-cell">Creating an object that travels at 1% light speed<span class="sub">by Chris · Life, Lighting</span></td>
                                    <td><span class="status-pill status-published">Published</span></td>
                                    <td>Nov 17, 2023</td>
                                    <td>4,918</td>
                                    <td class="row-more">···</td>
                                </tr>
                                <tr>
                                    <td class="post-title-cell">Everything you wanted to know about the metaverse<span class="sub">by Emma · Life</span></td>
                                    <td><span class="status-pill status-scheduled">Scheduled</span></td>
                                    <td>Sep 12, 2026</td>
                                    <td>—</td>
                                    <td class="row-more">···</td>
                                </tr>
                                <tr>
                                    <td class="post-title-cell">How to hire a developer straight out of bootcamp<span class="sub">by Chris · Lifestyle, Startups</span></td>
                                    <td><span class="status-pill status-draft">Draft</span></td>
                                    <td>Edited 2h ago</td>
                                    <td>—</td>
                                    <td class="row-more">···</td>
                                </tr>
                                <tr>
                                    <td class="post-title-cell">Why everyone is talking about 'green steel'<span class="sub">by Thomas · Lifestyle</span></td>
                                    <td><span class="status-pill status-published">Published</span></td>
                                    <td>Sep 14, 2020</td>
                                    <td>2,377</td>
                                    <td class="row-more">···</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="panel">
                        <div class="panel-header">
                            <h2>Quick draft</h2>
                        </div>
                        <div class="draft-panel">
                            <input class="draft-input" type="text" placeholder="Post title">
                            <textarea class="draft-textarea" placeholder="Start writing, or paste an outline..."></textarea>
                            <button class="draft-save">Save draft</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-admin-dashboard-layout>