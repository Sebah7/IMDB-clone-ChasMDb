    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Modify</title>
    </head>

    <body>

        <h2>Modify functions only for Admin</h><br><br>
            <!-- Genre Store Controller to add a genre to db from admin in blade. -->

            <!-- Function Store -->
            <form action="{{ route('genres.store') }}" method="POST">
                @csrf
                <label for="name">Genre Name:</label>
                <input type="text" name="name" id="name">
                <button type="submit">
                    Add Genre
                </button>
            </form>
            <br>

            <form action="{{ route('actors.store') }}" method="POST">
                @csrf
                <label for="name">Actor Name:</label>
                <input type="text" name="name" id="name">
                <button type="submit">
                    Add Actor
                </button>
            </form>

            <form action="{{ route('actors.destroy') }}" method="POST">
                @csrf
                @method('DELETE')
                <label for="name">Actor Name:</label>
                <input type="text" name="name" id="name">
                <button type="submit">
                    Delete Actor
                </button>
            </form>

            <br><br>
            <p>Add a movie to the db</p>
            <form action="{{ route('movies.store') }}" method="post">
                @csrf
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required maxlength="255"><br>

                <label for="actor">Actor:</label>
                <input type="text" id="actor" name="actor" required maxlength="255"><br>

                <label for="director">Director:</label>
                <input type="text" id="director" name="director" required maxlength="255"><br>

                <label for="genre">Genre:</label>
                <input type="text" id="genre" name="genre" required maxlength="255">

                <!-- Add more input fields as needed --><br>
                <!-- Function Store -->
                <form action="{{ route('genres.store') }}" method="POST">
                    @csrf
                    <label for="name">Genre Name:</label>
                    <input type="text" name="name" id="name">
                    <button type="submit">
                        Add Genre
                    </button>
                </form>

    </body>

    </html>