<script>

import axios from 'axios';

const API_URL = 'http://localhost:8000/api/';
const API_VER = 'v1/';
const API = API_URL + API_VER;

// Dichiaro Empty_New_Movie per aver la possibilità ogni volta di avere le caselle tags_id indipedenti
const Empty_New_Movie = {
    tags_id: []
};

export default {

    data() {

        return {

            movies: [],
            genres: [],
            tags: [],

            // Dichiaro il new_movies per semplificarmi con i dati nel value del form e per azzerare il contenuto ogni volta che avviene al submit
            new_movie: { ...Empty_New_Movie },

            // Imposto il movieForm in "false" e al click il form si aprirà
            state: {
                movieForm: false
            }
        }
    },
    methods: {
        getAllMoviesData() {

            axios.get(API + 'movie/all')
                .then(res => {

                    const data = res.data;
                    const success = data.success;

                    const response = data.response;

                    const movies = response.movies;
                    const genres = response.genres;
                    const tags = response.tags;

                    if (success) {

                        this.movies = movies;
                        this.genres = genres;
                        this.tags = tags;
                    }
                })
                .catch(err => console.log);
        },
        submitMovie(e) {

            e.preventDefault();

            const new_movie = this.new_movie;
            // Creo la condizione se il Movie e "d'aggiornare" o se fosse da creare lo inserisco nello "store"
            const actualApi = API + 'movie/' + (
                new_movie.id
                    ? 'update/' + new_movie.id
                    : 'store'
            );

            console.log(new_movie);
            console.log(actualApi);

            axios.post(actualApi, new_movie)
                .then(res => {

                    const data = res.data;
                    const success = data.success;

                    // Se va a buon fine si chiude il form e sia aggiornano i Movie
                    if (success) {

                        this.closeForm();
                        this.getAllMoviesData();
                    }
                })
                .catch(err => console.log);
        },
        // al click del bottone "Cancel" il form si chiuderà e resetterà il tutto
        closeForm() {

            this.new_movie = { ...Empty_New_Movie };
            this.state.movieForm = false;
        },
        editMovie(movie) {
            console.log('movie', movie);
            console.log('new_movie', this.new_movie);

            // Cliccando il tasto "edit" recupero i dati
            this.new_movie = { ...movie };

            // e il form passerà da una condizione "false" a "true" e si aprirà
            this.state.movieForm = true;

            // Dichiaro i tags_id
            this.new_movie.tags_id = [];

            // Tramite un ciclo for recupero le caselle selezionate
            for (let x = 0; x < movie.tags.length; x++) {

                const tag = movie.tags[x];
                this.new_movie.tags_id.push(tag.id);
            }
        },
        deleteMovie(movie) {

            axios.delete(API + 'movie/delete/' + movie.id)
                .then(res => {

                    const data = res.data;
                    const success = data.success;

                    // Se va a buon fine il "movie" verrà cancellato
                    if (success)
                        this.getAllMoviesData();
                })
                .catch(err => console.log);
        },
    },
    mounted() {
        this.getAllMoviesData();
    }
}
</script>

<template>
    <div>
        <h1>Movies</h1>
        <form v-if="state.movieForm">
            <label for="name">Name:</label>
            <input type="text" name="name" v-model="new_movie.name">
            <br>
            <label for="year">Year:</label>
            <input type="number" name="year" v-model="new_movie.year">
            <br>
            <label for="cashOut">Cash-Out:</label>
            <input type="number" name="cashOut" v-model="new_movie.cashOut">
            <br>
            <label for="genre">Genre:</label>
            <select name="genre_id" v-model="new_movie.genre_id">
                <option v-for="genre in genres" :key="genre.id" :value="genre.id">{{ genre.name }}</option>
            </select>
            <br>
            <label>Tags:</label>
            <br>
            <div v-for="tag in tags" :key="tag.id">
                <input type="checkbox" :value="tag.id" :id="tag.id" v-model="new_movie.tags_id">
                <label :for="tag.id">{{ tag.name }}</label>
                <br>
            </div>
            <button @click="closeForm">Cancel</button>
            <!-- Creo la condizione per variare il bottone da "Update Movie" ad "Create New Movie" -->
            <input type="submit" @click="submitMovie" :value="'id' in new_movie
                ? 'Update Movie: ' + new_movie.id
                : 'Create New Movie'">
        </form>
        <div v-else>
            <button @click="state.movieForm = true">Create a New Movie</button>
            <ul>
                <li v-for="movie in movies" :key="movie.id">
                    <h2>Name: </h2>{{ movie.name }} <br>
                    <h2>Year: </h2>{{ movie.year }}<br>
                    <h2>Cash Out: </h2>{{ movie.cashOut }}<br>
                    <ul>
                        <li v-for="tag in movie.tags" :key="tag.id">
                            {{ tag.name }}
                        </li>
                        <br>
                        <br>
                        <button @click="editMovie(movie)">Edit</button>
                        <button @click="deleteMovie(movie)">Delete</button>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</template>

<style scoped>
div {
    margin: 20px;
}

h2 {
    display: inline;
}

ul,
li {
    list-style-type: none;
    margin: 10px auto;
}
</style>
