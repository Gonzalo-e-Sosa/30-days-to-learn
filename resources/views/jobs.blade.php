<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>
    <style>
        .job {
            list-style-type: none;
            position: relative;
            cursor: pointer;

            >svg {
                position: absolute;
                left: -2rem;
                top: 1.5rem
            }
        }

        .job__link {
            text-decoration: none;
            color: inherit;

            &:link {
                color: inherit;
            }

            &:visited {
                color: inherit;
            }
        }

        .job__article p {
            color: #c2c7d0;
        }
    </style>
    <section>
        <h2>Jobs for Developers</h2>
        <p>Find your next developer job</p>
        <section>
            <ul>
                @foreach ($jobs as $job)
                <li class="job">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#eee" width="1em" height="1em" viewBox="0 0 24 24">
                        <path
                            d="M22 13.478V18a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3v-4.522l.553.277a21 21 0 0 0 18.897-.002zM14 2a3 3 0 0 1 3 3v1h2a3 3 0 0 1 3 3v2.242l-1.447.724a19 19 0 0 1-16.726.186l-.647-.32l-1.18-.59V9a3 3 0 0 1 3-3h2V5a3 3 0 0 1 3-3zm-2 8a1 1 0 0 0-1 1a1 1 0 1 0 2 .01c0-.562-.448-1.01-1-1.01m2-6h-4a1 1 0 0 0-1 1v1h6V5a1 1 0 0 0-1-1" />
                    </svg>
                    <a class="job__link" href="jobs/{{$job['id']}}">
                        <article class="job__article">
                            <div>
                                <h3>{{$job['title']}}</h3>
                                <h4>{{$job['company']}}</h4>
                            </div>
                            <div>
                                <ul>
                                    <li>
                                        <p>{{$job['description']}}</p>
                                    </li>
                                    <li>
                                        <p>Location: <span>{{$job['location']}}</span>
                                        </p>
                                    </li>
                                    <li>
                                        <p>Salary: <span>{{$job['salary']}}</span>
                                        </p>
                                    </li>
                                </ul>
                                <p>You can apply to this job here: <a href="{{$job['url']}}">Apply</a>

                            </div>
                            </p>
                            <footer>
                                <time>Posted: {{$job['date']}}</time>
                            </footer>
                        </article>
                    </a>
                </li>
                @endforeach
            </ul>
        </section>
    </section>

</x-layout>