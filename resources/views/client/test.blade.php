@extends('client.layout.master')

@section('content')
<style>
    .comment {
        border-left: 3px solid #0d6efd;
        padding-left: 10px;
        margin-bottom: 15px;
    }

    .comment-form {
        margin-bottom: 30px;
    }

    .profile-picture {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }

    .reply-form {
        margin-top: 10px;
        margin-left: 60px;
        display: none;
    }
</style>

<div class="container mt-5">
    <h2 class="mb-4">Comments</h2>

    <!-- Comment Form -->
    <div class="comment-form">
        <h4>Add a Comment</h4>
        <form id="commentForm">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
                <label for="profilePicture" class="form-label">Profile Picture URL</label>
                <input type="url" class="form-control" id="profilePicture" placeholder="https://example.com/image.jpg">
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Comment</label>
                <textarea class="form-control" id="comment" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Comment</button>
        </form>
    </div>

    <!-- Comments Display -->
    <div id="commentsContainer">
        <!-- Example comment -->
        <div class="comment" id="comment1">
            <div class="d-flex">
                <img src="https://via.placeholder.com/50" alt="Profile Picture" class="profile-picture me-3">
                <div>
                    <h5>John Doe</h5>
                    <p>This is an example comment. Great post!</p>
                    <small class="text-muted">Posted on: May 1, 2023</small>
                    <button class="btn btn-sm btn-link reply-btn" data-comment-id="comment1">Reply</button>
                </div>
            </div>
            <div class="reply-form" id="replyForm-comment1">
                <form class="reply-comment-form" data-parent-id="comment1">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Your name" required>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" rows="2" placeholder="Your reply" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Submit Reply</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    let commentId = 2;

    document.getElementById('commentForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const name = document.getElementById('name').value;
        const profilePicture = document.getElementById('profilePicture').value || 'https://via.placeholder.com/50';
        const comment = document.getElementById('comment').value;
        const date = new Date().toLocaleDateString();

        const commentHtml = `
                <div class="comment" id="comment${commentId}">
                    <div class="d-flex">
                        <img src="${profilePicture}" alt="Profile Picture" class="profile-picture me-3">
                        <div>
                            <h5>${name}</h5>
                            <p>${comment}</p>
                            <small class="text-muted">Posted on: ${date}</small>
                            <button class="btn btn-sm btn-link reply-btn" data-comment-id="comment${commentId}">Reply</button>
                        </div>
                    </div>
                    <div class="reply-form" id="replyForm-comment${commentId}">
                        <form class="reply-comment-form" data-parent-id="comment${commentId}">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Your name" required>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" rows="2" placeholder="Your reply" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Submit Reply</button>
                        </form>
                    </div>
                </div>
            `;

        document.getElementById('commentsContainer').insertAdjacentHTML('afterbegin', commentHtml);

        // Clear the form
        document.getElementById('name').value = '';
        document.getElementById('profilePicture').value = '';
        document.getElementById('comment').value = '';

        commentId++;
    });

    // Event delegation for reply buttons
    document.getElementById('commentsContainer').addEventListener('click', function(e) {
        if (e.target.classList.contains('reply-btn')) {
            const commentId = e.target.getAttribute('data-comment-id');
            const replyForm = document.getElementById(`replyForm-${commentId}`);
            replyForm.style.display = replyForm.style.display === 'none' ? 'block' : 'none';
        }
    });

    // Event delegation for reply form submission
    document.getElementById('commentsContainer').addEventListener('submit', function(e) {
        if (e.target.classList.contains('reply-comment-form')) {
            e.preventDefault();
            const parentId = e.target.getAttribute('data-parent-id');
            const name = e.target.querySelector('input[type="text"]').value;
            const reply = e.target.querySelector('textarea').value;
            const date = new Date().toLocaleDateString();

            const replyHtml = `
                    <div class="comment" style="margin-left: 60px;">
                        <div class="d-flex">
                            <img src="https://via.placeholder.com/50" alt="Profile Picture" class="profile-picture me-3">
                            <div>
                                <h5>${name}</h5>
                                <p>${reply}</p>
                                <small class="text-muted">Posted on: ${date}</small>
                            </div>
                        </div>
                    </div>
                `;

            document.getElementById(parentId).insertAdjacentHTML('beforeend', replyHtml);

            // Clear and hide the reply form
            e.target.reset();
            e.target.parentElement.style.display = 'none';
        }
    });
</script>
@endsection