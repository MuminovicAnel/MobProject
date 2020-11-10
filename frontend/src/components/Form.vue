<template>
  <div class="hello">
    <p>
      Outil pour calculer les nombres de Fibonacci. La suite de Fibonacci est
      une suite de nombres entiers dont chaque terme est la somme des deux
      termes précédents.
    </p>
    <form class="review-form" @submit.prevent="onSubmit">
      <p>
        <label for="number">Number:</label>
        <input id="number" v-model="number" placeholder="number" />
      </p>

      <p>
        <input type="submit" value="Submit" />
      </p>
    </form>

    <h1>{{ results }}</h1>
  </div>
</template>

<script>
export default {
  name: "HelloWorld",
  props: {
    results: [],
    number: Number,
    errors: []
  },
  beforeMount() {
    this.getFibonacciSequence();
  },
  methods: {
    async getFibonacciSequence(data) {
      const res = await fetch(process.env.API_URL, {
        method: "POST",
        body: JSON.stringify(data),
        headers: {"Content-type": "application/json; charset=UTF-8"}
      })
      .then(response => response.json()) 
      .then(json => { this.results = json })
      .catch(err => console.log(err));
    },
    onSubmit() {
      console.log("hello")
      this.number ? this.getFibonacciSequence(this.number) : this.errors.push("Number required");
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->

<style lang="stylus" scoped>
.hello
  margin: 20px auto;
  max-width: 700px;

label
  display: block;
  margin: 20px 0 10px;

input
  font-size: 20px;
  border: 1px double rgb(102, 97, 96);
  border-radius: 4px;

button
  font-size: 16px;
  background: rgb(64, 179, 140);
  padding: 0.4rem 1.3rem;
  text-align: center;
  border: none;
</style>
