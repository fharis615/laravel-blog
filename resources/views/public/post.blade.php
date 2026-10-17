<x-public-layout>
    <x-slot:slot2>
    <style>
        :root {
            --bg-color: #ffffff;
            --text-color: #181818;
            --muted-text: #858585;
            --accent-color: #f55a5a;
            --bg-soft: #fdf5f5;
            --border-color: #eaeaea;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        a { text-decoration: none; color: inherit; }
        ul { list-style: none; }

        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }

        /* ===== Shared header (identical to the rest of the site) ===== */
        header { background: #fff; padding: 30px 0; border-bottom: 1px solid transparent; }

        .nav-wrapper { display: flex; justify-content: space-between; align-items: center; }

        .logo { font-family: 'Playfair Display', serif; font-size: 26px; font-weight: 700; }

        .nav-links { display: flex; gap: 30px; font-size: 15px; font-weight: 500; }
        .nav-links a:hover { color: var(--accent-color); }

        .nav-actions { display: flex; align-items: center; gap: 20px; color: var(--muted-text); }
        .nav-actions svg { width: 18px; height: 18px; cursor: pointer; flex-shrink: 0; }

        .search-wrapper { display: flex; align-items: center; gap: 8px; }
        .search-input {
            width: 0; opacity: 0; padding: 0; border: none; outline: none;
            font-size: 14px; font-family: 'Inter', sans-serif; color: var(--text-color);
            border-bottom: 1px solid var(--border-color);
            transition: width 0.3s ease, opacity 0.3s ease, padding 0.3s ease;
        }
        .search-input.active { width: 180px; opacity: 1; padding: 4px 2px; }
        .search-label { cursor: pointer; }

        .login-wrapper { position: relative; }
        .login-btn { display: flex; align-items: center; gap: 8px; cursor: pointer; user-select: none; }
        .login-btn svg { cursor: pointer; }
        .login-dropdown {
            display: none; position: absolute; top: 130%; right: 0; background: #fff;
            border: 1px solid var(--border-color); border-radius: 8px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08); min-width: 170px; overflow: hidden; z-index: 20;
        }
        .login-dropdown.active { display: block; }
        .login-dropdown a { display: block; padding: 12px 18px; font-size: 14px; font-weight: 500; color: var(--text-color); transition: background 0.2s, color 0.2s; }
        .login-dropdown a:hover { background-color: var(--bg-soft); color: var(--accent-color); }
        .login-dropdown a + a { border-top: 1px solid var(--border-color); }

        /* ===== Shared footer (identical to the rest of the site) ===== */
        footer { padding: 40px 0; background: #fff; }
        .footer-content { display: flex; justify-content: space-between; align-items: center; font-size: 13px; color: var(--muted-text); }
        .footer-links { display: flex; gap: 20px; align-items: center; }
        .footer-links a:hover { color: var(--text-color); }
        .footer-links svg { width: 14px; height: 14px; vertical-align: middle; margin-right: 5px; }

        /* ===== Single post page content (sp- prefix, unique to this page) ===== */
        .sp-post-header {
            background-color: var(--bg-soft);
            text-align: center;
            padding: 60px 20px 50px 20px;
        }

        .sp-breadcrumb { font-size: 13px; color: var(--muted-text); margin-bottom: 22px; }
        .sp-breadcrumb a:hover { color: var(--accent-color); }
        .sp-breadcrumb span { margin: 0 6px; }

        .sp-post-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 42px;
            font-weight: 600;
            max-width: 780px;
            margin: 0 auto 22px auto;
            line-height: 1.25;
        }

        .sp-post-meta-row {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            font-size: 13px;
            color: var(--muted-text);
            flex-wrap: wrap;
        }
        .sp-post-meta-row svg { width: 14px; height: 14px; vertical-align: middle; margin-right: 4px; }

        .sp-meta-author { display: flex; align-items: center; gap: 8px; }
        .sp-meta-author img { width: 26px; height: 26px; border-radius: 50%; }

        .sp-cover-wrap { margin: -40px auto 0 auto; max-width: 900px; padding: 0 20px; }
        .sp-cover-wrap img {
            width: 100%;
            height: 420px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        }

        .sp-article-layout {
            max-width: 760px;
            margin: 60px auto 0 auto;
            padding: 0 20px;
        }

        .sp-article-body { font-size: 17px; color: #333; }
        .sp-article-body p { margin-bottom: 22px; }

        .sp-article-body h2 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 600;
            margin: 40px 0 18px 0;
            color: #1a1a1a;
        }

        .sp-article-body blockquote {
            border-left: 3px solid var(--accent-color);
            background: var(--bg-soft);
            padding: 18px 24px;
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 19px;
            color: #1a1a1a;
            margin: 30px 0;
            border-radius: 0 6px 6px 0;
        }

        .sp-article-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 40px 0 40px 0;
            padding-top: 30px;
            border-top: 1px solid var(--border-color);
        }
        .sp-article-tags a {
            background-color: #f4f4f4;
            padding: 6px 14px;
            border-radius: 20px;
            color: #555;
            font-size: 13px;
            font-weight: 500;
        }
        .sp-article-tags a:hover { background-color: #e0e0e0; }

        .sp-author-box {
            display: flex;
            align-items: center;
            gap: 18px;
            background: var(--bg-soft);
            border-radius: 10px;
            padding: 24px;
            margin-bottom: 60px;
        }
        .sp-author-box img { width: 60px; height: 60px; border-radius: 50%; }
        .sp-author-box h3 { font-family: 'Playfair Display', serif; font-size: 18px; font-weight: 600; margin-bottom: 6px; }
        .sp-author-box p { font-size: 14px; color: var(--muted-text); }

        /* ---------- Comments ---------- */
        .sp-comments-section { border-top: 1px solid var(--border-color); padding-top: 40px; margin-bottom: 60px; }
        .sp-comments-section h2 { font-family: 'Playfair Display', serif; font-size: 24px; font-weight: 600; margin-bottom: 30px; }

        .sp-comment {
            display: flex;
            gap: 14px;
            margin-bottom: 28px;
        }
        .sp-comment img { width: 40px; height: 40px; border-radius: 50%; flex-shrink: 0; }
        .sp-comment-body { flex: 1; }
        .sp-comment-top { display: flex; align-items: center; gap: 10px; margin-bottom: 6px; }
        .sp-comment-name { font-weight: 600; font-size: 14px; }
        .sp-comment-date { font-size: 12px; color: var(--muted-text); }
        .sp-comment-text { font-size: 14px; color: #3f3f3f; line-height: 1.6; margin-bottom: 8px; }
        .sp-comment-reply { font-size: 12px; font-weight: 600; color: var(--accent-color); cursor: pointer; }
        .sp-comment-reply:hover { text-decoration: underline; }

        .sp-comment.sp-comment-reply-item { margin-left: 54px; }

        .sp-comment-form {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid var(--border-color);
        }
        .sp-comment-form h3 { font-family: 'Playfair Display', serif; font-size: 18px; font-weight: 600; margin-bottom: 18px; }
        .sp-form-row { display: flex; gap: 14px; margin-bottom: 14px; }
        .sp-form-row input, .sp-comment-form textarea {
            width: 100%;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 11px 14px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            outline: none;
        }
        .sp-form-row input:focus, .sp-comment-form textarea:focus { border-color: var(--accent-color); }
        .sp-comment-form textarea { min-height: 110px; resize: vertical; margin-bottom: 16px; }

        .sp-comment-submit {
            background-color: var(--accent-color);
            color: white;
            padding: 12px 26px;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .sp-comment-submit:hover { background-color: #e34a4a; }

        /* ---------- Related posts ---------- */
        .sp-related-section {
            background-color: var(--bg-soft);
            padding: 70px 20px 90px 20px;
        }
        .sp-related-section h2 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 40px;
        }

        .sp-related-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            max-width: 1160px;
            margin: 0 auto;
        }

        .sp-related-card { background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.04); }
        .sp-related-card img {
            width: 100%;
            height: 170px;
            object-fit: cover;
            filter: grayscale(100%) contrast(1.1);
            transition: filter 0.4s ease;
        }
        .sp-related-card:hover img { filter: grayscale(0%) contrast(1.1); }

        .sp-related-body { padding: 18px 20px 22px 20px; }
        .sp-related-meta { font-size: 12px; color: var(--muted-text); margin-bottom: 8px; }
        .sp-related-title {
            font-family: 'Playfair Display', serif;
            font-size: 17px;
            font-weight: 600;
            line-height: 1.35;
            transition: color 0.3s;
        }
        .sp-related-title:hover { color: var(--accent-color); }

        @media (max-width: 768px) {
            .nav-links, .nav-actions { display: none; }
            .sp-post-header h1 { font-size: 28px; }
            .sp-cover-wrap img { height: 220px; }
            .sp-form-row { flex-direction: column; }
            .sp-related-grid { grid-template-columns: 1fr; }
        }
    </style>
    </x-slot:slot2>


    <main>
        <section class="sp-post-header">
            <div class="container">
                <div class="sp-breadcrumb"><a href="{{route('index')}}">Home</a><span>/</span><a href="category.html">{{$post->category->name}}</a><span>/</span>Article</div>
                <h1>{{$post->title}}</h1>
                <div class="sp-post-meta-row">
                    <div class="sp-meta-author">
                        <img src="{{asset('storage/1.jpg')}}" alt=" {{$post->user->name}}">
                        <span style="text-transform: capitalize;">by {{$post->user->name}}</span>
                    </div>
                    <span>·</span>
                    <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> {{$post->created_at->format('M d , Y')}}</span>
                    <span>·</span>
                    <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> 6 min read</span>
                </div>
            </div>
        </section>

        <div class="sp-cover-wrap">
            <img src="{{asset('storage/'.$post->cover_image)}}" alt="Train">
        </div>

        <article class="sp-article-layout">
            <div class="sp-article-body">

                {!! $post->body !!}
            </div>

            <div class="sp-article-tags">
                @foreach ($post->tags as $t)
                <a href="category.html">{{$t->name}}</a>
                @endforeach
            </div>

            <div class="sp-author-box">
                <img src="{{asset('storage/1.jpg')}}" alt="{{$post->user->name}}">
                <div>
                    <h3>{{$post->user->name}}</h3>
                    <p>Writes about AI, tooling, and the gap between demos and production. Based in Berlin.</p>
                </div>
            </div>

            <section class="sp-comments-section">
                <h2>{{count($post->comments)}} Comments</h2>

                @forelse ($post->comments as $c)
                <div class="sp-comment">
                    <div class="sp-comment-body">
                        <div class="sp-comment-top">
                            <span class="sp-comment-name" style="text-transform:capitalize;">{{$c->name}}</span>
                            <span class="sp-comment-date">{{$c->smartTime($c->created_at)}} ago</span>
                        </div>
                        <p class="sp-comment-text">{{$c->body}}</p>
                        <span class="sp-comment-reply">Reply</span>
                    </div>
                </div>
                @empty
                    
                @endforelse


                <form class="sp-comment-form" method="POST" action="{{route('comment.store', $post)}}">
                    @csrf
                    <h3>Leave a comment</h3>
                    <div class="sp-form-row">
                        <input type="text" value="{{old('name')}}" name="name" placeholder="Your name">
                        <input type="email" value="{{old('email')}}" name="email" placeholder="Your email">
                    </div>
                    <textarea name="body" placeholder="Write your comment...">{{old('body')}}</textarea>
                    <button type="submit" class="sp-comment-submit">Post comment</button>
                </form>
            </section>
        </article>

        <section class="sp-related-section">
            <div class="container">
                <h2>Related Posts</h2>
                <div class="sp-related-grid">
                    <a href="post.html" class="sp-related-card">
                        <img src="https://picsum.photos/id/1181/600/400" alt="Coders">
                        <div class="sp-related-body">
                            <div class="sp-related-meta">Machine · 02 min read</div>
                            <div class="sp-related-title">What actually happens when you press "deploy"</div>
                        </div>
                    </a>
                    <a href="post.html" class="sp-related-card">
                        <img src="https://picsum.photos/id/111/600/400" alt="Futuristic Car">
                        <div class="sp-related-body">
                            <div class="sp-related-meta">Life · 02 min read</div>
                            <div class="sp-related-title">Creating an object that travels at 1% the speed of light?</div>
                        </div>
                    </a>
                    <a href="post.html" class="sp-related-card">
                        <img src="https://picsum.photos/id/1067/600/400" alt="VR Headset">
                        <div class="sp-related-body">
                            <div class="sp-related-meta">Life · 01 min read</div>
                            <div class="sp-related-title">Everything you wanted to know about the metaverse</div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <x-slot:slot3>
        <script>
        // --- Search toggle (no post grid on this page, so it's just a visual toggle) ---
        const searchInput = document.getElementById('searchInput');
        const searchLabel = document.getElementById('searchLabel');

        searchLabel.addEventListener('click', () => {
            searchInput.classList.toggle('active');
            if (searchInput.classList.contains('active')) {
                searchInput.focus();
            } else {
                searchInput.value = '';
            }
        });
        
        

    </script>
    @if (session('success'))
            <script async>
                qnShowToast({ title: 'Saved', message: '{{ session("success") }}', type: 'success' });
            </script>
        @endif
         @if (session('error'))
            <script async>
                qnShowToast({ title: 'Error', message: '{{ session("error") }}', type: 'error' });
            </script>
        @endif
    </x-slot:slot3>
</x-public-layout>