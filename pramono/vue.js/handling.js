var example1 = new Vue({
  el: '#example-1',
  data: {
    counter: 0,
  },
});
var example2 = new Vue({
  el: '#example-2',
  data: {
    name: 'Vue.js',
  },
  // define methods under the `methods` object
  methods: {
    greet: function (event) {
      // `this` inside methods points to the Vue instance
      alert('Hello ' + this.name + '!');
      // `event` is the native DOM event
      if (event) {
        alert(event.target.tagName);
      }
    },
  },
});

new Vue({
  el: '#example-3',
  methods: {
    say: function (message) {
      alert(message);
    },
  },
});

new Vue({
  el: '#example-4',
  methods: {
    warn: function (message, event) {
      // now we have access to the native event
      if (event) {
        event.preventDefault();
      }
      alert(message);
    },
  },
});

new Vue({
  el: '#e-modif',
  methods: {
    func2: function () {
      alert('Hello');
    },
  },
});

new Vue({
  el: '#e-modif2',
  methods: {
    func3: function () {
      alert('Hello World');
    },
  },
});

new Vue({
  el: '#e-selfParent',
  methods: {
    func4: function () {
      alert('Hello world');
    },
  },
});

new Vue({
  el: '#e-selfChild',
  methods: {
    func5: function () {
      alert('ok');
    },
  },
});

new Vue({
  el: '#e-modifOnce',
  data: {
    counter: 0,
  },
});

new Vue({
  el: '#key-1',
  methods: {
    funcKey1: function (pesan) {
      alert(pesan);
    },
  },
});

new Vue({
  el: '#key-2',
  methods: {
    funcKey2: function () {
      window.location.href = 'https://github.com/dimashv09/batch1-laravue/tree/pramono/pramono/vue.js';
    },
  },
});
