<!DOCTYPE html>
<html lang="en">

<?php
include 'header.php';
?>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark-2">
    <div class="container">
      <a class="navbar-brand mr-5" href="#">HORROR SCOPE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item mx-2 active">
            <a class="nav-link" href="#">หน้าแรก <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="#">ดูดวงรายวัน</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="#">ทำนายฝัน</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="#">ดูดวงไพ่ยิปซี</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="#">ดูดวงความรัก</a>
          </li>
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li> -->
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <button class="btn btn-gold text-white my-2 my-sm-0 px-4" type="submit">ดูดวงออนไลน์</button>
        </form>
      </div>
    </div>
  </nav>
  <div class="duduang-header py-5">
    <div class="container text-white text-center mt-xl-5">
      <h2 class="text-gold">ดูดวงไพ่ยิปซี</h2>
      <p class="mb-5">ให้ตั้งจิตอธิษฐานถึงสิ่งที่เราอยากรู้แล้วกดเลือก 1 ใบ</p>
      <div class="gipsy-container mt-4">
        <?php $rows = 3;
        ?>
        <?php $cards_per_row = 15;
        ?>
        <?php for ($row = 0; $row < $rows; $row++) : ?>
          <div class="gipsy-row" style="position:relative; top:-10px;">
            <?php for ($i = 0; $i < $cards_per_row; $i++) : ?>
              <div class="gipsy" id="card-<?php echo ($row * $cards_per_row) + $i; ?>">
                <img src="https://media.discordapp.net/attachments/1182321990611243088/1207532091185692784/tarot-card-back.png?ex=65dffce5&is=65cd87e5&hm=e92c7cb35c1d43ceae60d9af9590cba9cdb30f2bb850601268d6c5e731ce9b87&=&format=webp&quality=lossless&width=284&height=468" class="img-fluid rounded" alt="">
              </div>
            <?php endfor; ?>
          </div>
        <?php endfor; ?>
      </div>
      <div class="col-xl-6 mx-auto mt-4">
        <div class="row">
          <div class="col">
            <button class="btn btn-outline-gold text-white w-100 z-index-1 py-2" id="shuffle">สับไพ่</button>
          </div>
          <div class="col">
            <button class="btn btn-gold text-white w-100  py-2">อ่านคำทำนาย</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var cards = document.querySelectorAll('.gipsy');
    var maxSelections = 3;
    var selectedCardIds = [];

    cards.forEach(function(card) {
      card.addEventListener('click', function() {
        var cardId = this.getAttribute('id');
        var selectedCards = document.querySelectorAll('.gipsy.selected').length;

        if (this.classList.contains('selected')) {
          this.classList.remove('selected');
          var index = selectedCardIds.indexOf(cardId);
          if (index > -1) {
            selectedCardIds.splice(index, 1);
          }
        } else if (selectedCards < maxSelections) {
          this.classList.add('selected');
          selectedCardIds.push(cardId);
        } else {
          alert('คุณเลือกครบแล้ว ' + maxSelections + ' ใบ');
        }

        console.log('คุณเลือกการ์ด :', selectedCardIds);
      });
    });

    document.querySelector('#shuffle').addEventListener('click', function() {
      this.disabled = true;
      this.innerText = 'กำลังสับไพ่';

      const shuffledCards = shuffle([...cards]);

      cards.forEach(card => {
        card.classList.remove('selected');
      });
      selectedCardIds = [];

      shuffledCards.forEach((card, index) => {
        setTimeout(() => {
          card.classList.add('shuffle-start');
        }, index * 50);

        card.parentNode.appendChild(card);
      });

      setTimeout(() => {
        shuffledCards.forEach(card => {
          card.classList.remove('shuffle-start');
        });

        document.querySelector('#shuffle').disabled = false;
        document.querySelector('#shuffle').innerText = 'สับไพ่';
      }, shuffledCards.length * 50 + 500);
    });

    function shuffle(array) {
      for (let i = array.length - 1; i > 0; i--) {
        let j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
      }
      return array;
    }
  });
</script>


</html>