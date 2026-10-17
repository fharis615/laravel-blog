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

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        ul {
            list-style: none;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background: #fff;
            padding: 30px 0;
            border-bottom: 1px solid transparent;
        }

        .nav-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            font-weight: 700;
        }

        .nav-links {
            display: flex;
            gap: 30px;
            font-size: 15px;
            font-weight: 500;
        }

        .nav-links a:hover {
            color: var(--accent-color);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 20px;
            color: var(--muted-text);
        }

        .nav-actions svg {
            width: 18px;
            height: 18px;
            cursor: pointer;
            flex-shrink: 0;
        }

        /* Search */
        .search-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .search-input {
            width: 0;
            opacity: 0;
            padding: 0;
            border: none;
            outline: none;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            color: var(--text-color);
            border-bottom: 1px solid var(--border-color);
            transition: width 0.3s ease, opacity 0.3s ease, padding 0.3s ease;
        }

        .search-input.active {
            width: 180px;
            opacity: 1;
            padding: 4px 2px;
        }

        .search-label {
            cursor: pointer;
        }

        /* Login */
        .login-wrapper {
            position: relative;
        }

        .login-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            user-select: none;
        }

        .login-btn svg {
            cursor: pointer;
        }

        .login-dropdown {
            display: none;
            position: absolute;
            top: 130%;
            right: 0;
            background: #fff;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
            min-width: 170px;
            overflow: hidden;
            z-index: 20;
        }

        .login-dropdown.active {
            display: block;
        }

        .login-dropdown a {
            display: block;
            padding: 12px 18px;
            font-size: 14px;
            font-weight: 500;
            color: var(--text-color);
            transition: background 0.2s, color 0.2s;
        }

        .login-dropdown a:hover {
            background-color: var(--bg-soft);
            color: var(--accent-color);
        }

        .login-dropdown a + a {
            border-top: 1px solid var(--border-color);
        }

        /* Hero & Main */
        .hero {
            background-color: var(--bg-soft);
            text-align: center;
            padding: 80px 20px;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            font-weight: 600;
            color: #1a1a1a;
            max-width: 800px;
            margin: 0 auto 30px auto;
            line-height: 1.2;
        }

        .hero h2 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 600;
            color: #1a1a1a;
            margin-top: 60px;
            margin-bottom: 40px;
        }

        /* Blog Grid */
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 50px;
            margin-bottom: 40px;
        }

        .post-card img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            border-radius: 4px;
            margin-bottom: 20px;
            filter: grayscale(100%) contrast(1.1);
            transition: filter 0.4s ease;
        }

        .post-card:hover img {
            filter: grayscale(0%) contrast(1.1);
        }

        .post-meta {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 13px;
            color: var(--muted-text);
            margin-bottom: 12px;
        }

        .post-meta svg {
            width: 14px;
            height: 14px;
            vertical-align: middle;
            margin-right: 4px;
        }

        .post-title {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            font-weight: 600;
            margin-bottom: 12px;
            line-height: 1.3;
            transition: color 0.3s;
        }

        .post-title:hover {
            color: var(--accent-color);
        }

        .post-excerpt {
            font-size: 15px;
            color: var(--muted-text);
            margin-bottom: 20px;
        }

        .post-footer {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 13px;
            font-weight: 500;
        }

        .author {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .author img {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            margin: 0;
            filter: none;
        }

        .tags {
            display: flex;
            gap: 8px;
        }

        .tag {
            background-color: #f4f4f4;
            padding: 4px 10px;
            border-radius: 20px;
            color: #555;
        }

        .tag:hover {
            background-color: #e0e0e0;
        }

        /* View All Button */
        .view-all-container {
            text-align: center;
            margin: 60px 0 0 0;
        }

        .btn-primary {
            background-color: var(--accent-color);
            color: white;
            padding: 14px 28px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 15px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: background 0.3s;
            box-shadow: 0 4px 15px rgba(245, 90, 90, 0.3);
        }

        .btn-primary:hover {
            background-color: #e34a4a;
        }

        .btn-primary svg {
            width: 16px;
            height: 16px;
        }

        /* Newsletter */
        .newsletter {
            background-color: var(--bg-soft);
            padding-bottom: 100px;
            text-align: center;
        }

        .newsletter h2 {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            font-weight: 600;
            margin-bottom: 30px;
            color: #1a1a1a;
        }

        .newsletter-form {
            display: inline-flex;
            background: white;
            padding: 8px;
            border-radius: 6px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            gap: 10px;
        }

        .newsletter-form input {
            border: none;
            outline: none;
            padding: 12px 20px;
            font-size: 15px;
            width: 300px;
            color: #555;
        }

        .newsletter-form button {
            background-color: var(--accent-color);
            color: white;
            border: none;
            border-radius: 4px;
            padding: 12px 24px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .newsletter-form button:hover {
            background-color: #e34a4a;
        }

        /* Footer */
        footer {
            padding: 40px 0;
            background: #fff;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            color: var(--muted-text);
        }

        .footer-links {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .footer-links a:hover {
            color: var(--text-color);
        }

        .footer-links svg {
            width: 14px;
            height: 14px;
            vertical-align: middle;
            margin-right: 5px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .nav-links, .nav-actions {
                display: none;
            }
            .hero h1 {
                font-size: 32px;
            }
            .blog-grid {
                grid-template-columns: 1fr;
            }
            .newsletter-form {
                flex-direction: column;
                width: 100%;
            }
            .newsletter-form input, .newsletter-form button {
                width: 100%;
            }
        }
    </style>
    </x-slot:slot2>

    <main>
        <section class="hero">
            <div class="container">
                <h1 style="text-wrap: balance;">
                Taking control of your daily life is easy when you know how!
                </h1>

                
                <h2>Recent Posts</h2>
                
                <div class="blog-grid" id="blogGrid">
                    @forelse ($posts as $post)
                        
                    <!-- Post 1 -->
                    <article class="post-card">
                        <img src="{{asset('storage/'. $post->cover_image)}}" alt="{{$post->title}}">
                        <div class="post-meta">
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>  {{$post->created_at->format('M d , y')}}</span>
                            <span>·</span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> {{$post->minReads}} min read</span>
                        </div>
                        <h3 class="post-title"><a href="{{route('post', $post->slug)}}">{{$post->title}}</a></h3>
                        <p class="post-excerpt">{{$post->excerpt}}</p>
                        <div class="post-footer">
                            <div class="author">
                                <img src="{{asset('storage/1.jpg')}}" alt="{{ $post->user->name}}">
                                <span>by {{$post->user->name}}</span>
                            </div>
                            <span style="color: #ccc;">·</span>
                            <div class="tags">
                                @foreach ($post->tags as $tag)
                                <a href="#" class="tag">{{$tag->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </article>
                    @empty
                        
                    @endforelse

                    <!-- Post 2 
                    <article class="post-card">
                        <img src="https://picsum.photos/id/111/600/400" alt="Futuristic Car">
                        <div class="post-meta">
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> Nov 17, 2023</span>
                            <span>·</span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> 02 min read</span>
                        </div>
                        <h3 class="post-title"><a href="#">Creating an object that travels at 1% the speed of light?</a></h3>
                        <p class="post-excerpt">Light is fast. In fact, it is the fastest thing that exists, and a law of the universe is that nothing can move faster than light. Light travels at...</p>
                        <div class="post-footer">
                            <div class="author">
                                <img src="https://i.pravatar.cc/150?img=12" alt="Chris">
                                <span>by Chris</span>
                            </div>
                            <span style="color: #ccc;">·</span>
                            <div class="tags">
                                <a href="#" class="tag">Life</a>
                                <a href="#" class="tag">Lighting</a>
                            </div>
                        </div>
                    </article>

                    Post 3 
                    <article class="post-card">
                        <img src="https://picsum.photos/id/1067/600/400" alt="VR Headset">
                        <div class="post-meta">
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> Nov 16, 2023</span>
                            <span>·</span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> 01 min read</span>
                        </div>
                        <h3 class="post-title"><a href="#">Everything you wanted to know about the metaverse</a></h3>
                        <p class="post-excerpt">In the wake of Facebook rebranding as Meta, reflecting its focus on the "metaverse," Microsoft has now announced it, too, will launch into th...</p>
                        <div class="post-footer">
                            <div class="author">
                                <img src="https://i.pravatar.cc/150?img=5" alt="Emma">
                                <span>by Emma</span>
                            </div>
                            <span style="color: #ccc;">·</span>
                            <div class="tags">
                                <a href="#" class="tag">Life</a>
                            </div>
                        </div>
                    </article>

                     Post 4 
                    <article class="post-card">
                        <img src="https://picsum.photos/id/1181/600/400" alt="Coders">
                        <div class="post-meta">
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> Nov 16, 2023</span>
                            <span>·</span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> 02 min read</span>
                        </div>
                        <h3 class="post-title"><a href="#">How to hire a developer straight out of bootcamp — without getting burned</a></h3>
                        <p class="post-excerpt">There's a worldwide talent shortage in software development, and nearly one-third of hiring managers have hired someone from a codin...</p>
                        <div class="post-footer">
                            <div class="author">
                                <img src="https://i.pravatar.cc/150?img=12" alt="Chris">
                                <span>by Chris</span>
                            </div>
                            <span style="color: #ccc;">·</span>
                            <div class="tags">
                                <a href="#" class="tag">Lifestyle</a>
                                <a href="#" class="tag">Startups</a>
                            </div>
                        </div>
                    </article>

                    Post 5 
                    <article class="post-card">
                        <img src="https://picsum.photos/id/180/600/400" alt="WordPress Screen">
                        <div class="post-meta">
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> Oct 12, 2020</span>
                            <span>·</span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> 02 min read</span>
                        </div>
                        <h3 class="post-title"><a href="#">Why developers are so divided over WordPress</a></h3>
                        <p class="post-excerpt">After seeing WordPress top the most dreaded platform on Stack Overflow's Developer Survey for two years in a row (2019 and 2020), ...</p>
                        <div class="post-footer">
                            <div class="author">
                                <img src="https://i.pravatar.cc/150?img=11" alt="Thomas">
                                <span>by Thomas</span>
                            </div>
                            <span style="color: #ccc;">·</span>
                            <div class="tags">
                                <a href="#" class="tag">Work</a>
                                <a href="#" class="tag">Lifestyle</a>
                            </div>
                        </div>
                    </article>

                     Post 6 
                    <article class="post-card">
                        <img src="https://picsum.photos/id/1060/600/400" alt="Wires">
                        <div class="post-meta">
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> Sep 14, 2020</span>
                            <span>·</span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> 02 min read</span>
                        </div>
                        <h3 class="post-title"><a href="#">Why everyone is talking about 'green steel' at COP26</a></h3>
                        <p class="post-excerpt">Among the metric of climate change pledges and platitudes, there's a term I've been hearing a lot at COP26 this week — green steel. But...</p>
                        <div class="post-footer">
                            <div class="author">
                                <img src="https://i.pravatar.cc/150?img=11" alt="Thomas">
                                <span>by Thomas</span>
                            </div>
                            <span style="color: #ccc;">·</span>
                            <div class="tags">
                                <a href="#" class="tag">Lifestyle</a>
                            </div>
                        </div>
                    </article> -->
                </div>

                <div class="view-all-container">
                    <a href="#" class="btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                        View All Posts
                    </a>
                </div>
            </div>
        </section>

        <section class="newsletter">
            <div class="container">
                <h2>Get latest posts delivered<br>right to your inbox</h2>
                <form class="newsletter-form">
                    <input type="email" placeholder="Your email address">
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        Join today
                    </button>
                </form>
            </div>
        </section>
    </main>

    <x-slot:slot3>
         <script>
        // --- Search toggle + live filter ---
        const searchInput = document.getElementById('searchInput');
        const searchLabel = document.getElementById('searchLabel');
        const blogGrid = document.getElementById('blogGrid');
        const postCards = blogGrid.querySelectorAll('.post-card');

        function toggleSearch() {
            searchInput.classList.toggle('active');
            if (searchInput.classList.contains('active')) {
                searchInput.focus();
            } else {
                searchInput.value = '';
                filterPosts('');
            }
        }

        searchLabel.addEventListener('click', toggleSearch);

        function filterPosts(query) {
            const q = query.trim().toLowerCase();
            postCards.forEach(card => {
                const title = card.querySelector('.post-title').textContent.toLowerCase();
                const excerpt = card.querySelector('.post-excerpt').textContent.toLowerCase();
                const matches = title.includes(q) || excerpt.includes(q);
                card.style.display = matches ? '' : 'none';
            });
        }

        searchInput.addEventListener('input', (e) => filterPosts(e.target.value));
    </script>

     
    </x-slot:slot3>
</x-public-layout>