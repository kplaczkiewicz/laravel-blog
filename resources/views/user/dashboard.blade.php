<x-app-layout>
    <div class="container py-12">
        <x-page-header>
            Dashboard
        </x-page-header>

        <div class="py-8">
            <div class="prose max-w-7xl mx-auto">
                <div class="overflow-x-auto">
                    @unless ($posts->isEmpty())
                        <table class="table w-full my-0">
                            <thead>
                                <th class="!static">#</th>
                                <th>Post</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Manage Comments</th>
                            </thead>

                            <tbody>
                                @php
                                    $offset = $posts->perPage() * ($posts->currentPage() - 1);
                                @endphp

                                @foreach ($posts as $post)
                                    <tr>
                                        <td>
                                            {{ $loop->index + 1 + $offset }}
                                        </td>

                                        <td>
                                            <a href="{{ route('posts.show', $post->id) }}" class="link flex gap-4 items-center">
                                                <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('assets/img/post-placeholder.jpg') }}" alt="post thumbnail" class="max-h-[150px] max-w-[200px] object-cover">
                                                {{ $post->title }}
                                            </a>
                                        </td>

                                        <td>
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info">Edit</a>
                                        </td>

                                        <td>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                
                                                <button type="submit" class="btn btn-error">Delete</button>
                                            </form>
                                        </td>

                                        <td>
                                            <a href="/" class="btn">Manage comments</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-6">
                            {{ $posts->appends($_GET)->links() }}
                        </div>
                    @else
                        <div class="text-center">
                            <h2>No posts found</h2>

                            <a href="{{ route('posts.create') }}" class="btn">Add a post</a>
                        </div>
                    @endunless
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
