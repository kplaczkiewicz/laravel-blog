<x-app-layout>
    <div class="container py-12">
        <x-page-header>
            New comments for: <br> {{ $post->title }}
        </x-page-header>

        <div class="py-8">
            <div class="prose max-w-7xl mx-auto">
                <div class="overflow-x-auto">
                    @unless ($comments->isEmpty())
                        <table class="table table-zebra w-full my-0">
                            <thead>
                                <th class="!static">#</th>
                                <th>Author</th>
                                <th>Content</th>
                                <th>Approve</th>
                                <th>Delete</th>
                            </thead>

                            <tbody>
                                @php
                                    $offset = $comments->perPage() * ($comments->currentPage() - 1);
                                @endphp

                                @foreach ($comments as $comment)
                                    <tr>
                                        <td>{{ $loop->index + 1 + $offset }}</td>
                                        <td>{{ $comment->author }}</td>
                                        <td>{{ $comment->content }}</td>
                                        <td>
                                            <form action="/comments/{{$comment->id}}/approve" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Approve</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="/comments/{{$comment->id}}/destroy" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-error">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-6">
                            {{ $comments->appends($_GET)->links() }}
                        </div>
                    @else
                        <div class="text-center">
                            <h3>No new comments found</h3>
                        </div>
                    @endunless
                </div>

                <div class="mt-16 text-center">
                    <a class="btn btn-wide" href="{{ route('posts.show', $post->id) }}">Go to post</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
