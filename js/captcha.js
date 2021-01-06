var items = [
  {
    s: 'Liam says to Emma: "It\'s a beautiful day, isn\'t it?"',
    q: 'Who is Liam talking to? (case sensitive)',
    a: 'Emma'
  },
  {
    s: 'Mia says to Benjamin: "It\'s a beautiful day, isn\'t it?"',
    q: 'Who is Mia talking to? (case sensitive)',
    a: 'Benjamin'
  },
  {
    s: 'William says to Ava: "It\'s a beautiful day, isn\'t it?"',
    q: 'Who is William talking to? (case sensitive)',
    a: 'Ava'
  },
  {
    s: 'Amelia says to Noah: "It\'s a beautiful day, isn\'t it?"',
    q: 'Who is Amelia talking to? (case sensitive)',
    a: 'Noah'
  },
  {
    s: 'Evelyn says to James: "It\'s a beautiful day, isn\'t it?"',
    q: 'Who is Evelyn talking to? (case sensitive)',
    a: 'James'
  }
];

$(document).ready(() => {
  var item = items[Math.floor(Math.random()*items.length)];

  $("#statement").html(item.s);
  $("#question").html(item.q);

  $("#done").click(() => {
    if ($("#answer").val() == item.a) {
      window.location = "consent.php";
    } else {
      alert("Sorry, that's incorrect");
      window.location = "http://google.com";
    }
  });
});
