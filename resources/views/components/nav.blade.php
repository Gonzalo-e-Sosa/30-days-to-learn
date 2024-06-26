<nav class="navigation">
    <div>
        <a href="/" style="text-decoration: none">Laravel</a>
    </div>
    <div>
        <ul>
            <li>
                <x-nav-link :href="url('/')">Home</x-nav-link>
            </li>
            <li>
                <x-nav-link :href="url('/about')">About</x-nav-link>
            </li>
            <li>
                <x-nav-link :href="url('/jobs')">Jobs</x-nav-link>
            </li>
            <li>
                <x-nav-link :href="url('/contact')">Contact</x-nav-link>
            </li>
            <li>
                <x-nav-link type="button">Like</x-nav-link>
            </li>
        </ul>
    </div>
    <style>
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-inline: var(--padding-inline);
        }

        @media screen and (max-width: 768px) {
            nav {
                padding-inline: calc(var(--padding-inline) / 2);

                ul {
                    display: none;
                }
            }
        }
    </style>
</nav>