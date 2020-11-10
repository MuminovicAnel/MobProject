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
        <input id="number" v-model.number="number" placeholder="number" />
      </p>

      <p>
        <input type="submit" value="Submit" />
      </p>
    </form>

    <p v-if="errors.length">
      <b>Please correct the following error(s):</b>
      <ul>
        <li v-for="error in errors" :key="error">{{ error }}</li>
      </ul>
    </p>

    <h2>{{ results }}</h2>
  </div>
</template>

<script>
export default {
  name: "Form",
  props: {
    value: Number,
    results: Array
  },
  data() {
    return {
      number: this.value,
      errors: []
    }
  },
  methods: {
    getFibonacciSequence(data) {
      this.$http.get(process.env.VUE_APP_API_URL + 'api/get_fibonacci.php/?id=' + data)
      .then((result) => {
        this.results = result.data.Fibonacci_sequence;
      })
    },
    onSubmit() {
      this.errors = [];
      if(this.number && Number.isSafeInteger(this.number) && this.number <= 5000) {
        this.getFibonacciSequence(this.number);
      } else {
        this.errors.push("Number required");
        this.results = null;
      }
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
