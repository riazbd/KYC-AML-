<main class="container my-5">
    <div class="mx-auto p-4 bg-light vh-min-100">
        @if (Session::get('message') and Session::get('message') == 'Successfully Read')
            <p class="text-success">Your document is validated!!</p>
        @else
            <p class="text-danger">{{Session::get('message')}}. Although your document has been submitted for human review.</p>
        @endif
    </div>
</main>
