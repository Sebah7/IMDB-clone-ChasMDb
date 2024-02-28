<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Modify</title>
</head>

<body>

    <h2>Modify functions only for Admin</h>

        <form action="{{ route('movies.store') }}" method="POST">
            @csrf
            <div>
                <label for="name">Movie title:</label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <button type="submit">
                    Add Movie
                </button>
            </div>
        </form>

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

                  @foreach ($genres as $genres)
            <ul>
                <p>Genre type: {{ $genres-> name }}</p>
            </ul>
         Delete Button
        <form action="{{ route('genres.destroy', $genre->id) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('Are you sure you want to delete this genre?')">Delete</button>
        </form>
    </div>


        <form action="{{ route('actors.store') }}" method="POST">
            @csrf
            <label for="name">Actor Name:</label>
            <input type="text" name="name" id="name">
            <button type="submit">
                Add Actor
            </button>
        </form><br><br>

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


            <button type="submit">Create Movie</button>
        </form>
</body>

</html>