<x-app-layout>
    <div class="container py-12">
        <x-page-header>
            Dashboard
        </x-page-header>

        <div class="py-8">
            <div class="prose max-w-7xl mx-auto">
                <div class="overflow-x-auto">
                    @unless ($posts->isEmpty())
                        <table class="table table-zebra w-full my-0">
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
                                            <a href="{{ route('posts.show', $post->id) }}"
                                                class="link flex gap-4 items-center">
                                                <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('assets/img/post-placeholder.jpg') }}"
                                                    alt="post thumbnail" class="max-h-[150px] max-w-[200px] object-cover">
                                                {{ $post->title }}
                                            </a>
                                        </td>

                                        <td>
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info">Edit</a>
                                        </td>

                                        <td>
                                            <label for="remove_post_{{ $post->id }}" class="btn btn-error">Delete</label>
                                        </td>

                                        <td>
                                            <a href="{{ route('posts.manage-comments', $post->id) }}" class="btn indicator">
                                                @php
                                                    $not_approved = $post->comments->where('approved', false)->count();
                                                @endphp

                                                @if ($not_approved != 0)
                                                    <span class="indicator-item badge badge-info">{{ $not_approved }}</span>
                                                @endif
                                                Manage comments
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Remove post modal -->
                                    <x-modal name="remove_post_{{ $post->id }}">
                                        <div class="prose pr-10">
                                            <h2 class="mb-4">Delete post - {{ $post->title }}?</h2>
                                        </div>

                                        <p>Are sure you want to delete this post? This action cannot be reversed!</p>

                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POSTs">
                                            @csrf
                                            @method('DELETE')

                                            <div class="mt-6 flex justify-end">
                                                <label for="remove_post_{{ $post->id }}" class="btn btn-outline">
                                                    Cancel
                                                </label>
                                
                                                <x-danger-button class="ml-3">
                                                    {{ __('Delete Post') }}
                                                </x-danger-button>
                                            </div>
                                        </form>
                                    </x-modal>
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
