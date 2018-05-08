<?php
include('lang.php');
file_put_contents('lang_export.js', 'var lang = '.json_encode($lang).';');
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="tapicerzy mińsk mazowiecki, zakłady tapicerskie, tapicerka, usługi tapicerskie, tapicerstwo samochodowe, tapicerowanie, tapicerstwo meblowe, mińsk mazowiecki" />
    <meta name="description" content="Renowacja mebli tapicerskich, meble tapicerowane na zamówienie, tapicerstwo samochodowe, obijanie drzwi." />
    <title>Zakład Tapicerski Arkadiusz Perzanowski</title>
    <link rel="stylesheet" href="dist/styles.all.min.css">
  </head>
  <body>

    <header class="navigation">
      <div class="section__wrapper section__wrapper--navigation" data-menu-height>
        <h1 class="navigation_logo">
          <span class="logo_txt--big">Zakład Tapicerski</span>
          <span class="logo_txt--small">Arkadiusz Perzanowski</span>
        </h1>
        <nav>
          <ul class="navigation_list">
            <li class="navigation_list_el"><a href="#section_home">Home</a></li>
            <li class="navigation_list_el"><a href="#section_about">O nas</a></li>
            <li class="navigation_list_el"><a href="#section_gallery">Galeria prac</a></li>
            <li class="navigation_list_el"><a href="#section_contact">Kontakt</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <main class="page__container">

      <section class="page__section section_home" id="section_home">
        <div class="section__background">
        <div class="section__wrapper title">
          <span class="title__pre">Ponad</span>
          <span class="title__big">20 lat doświadczenia</span>
          <a class="title__anchor" href="#section_about">Dowiedz się więcej</a>
        </div>
      </div>
      </section>

      <section class="page__section section_about" id="section_about">
        <div class="section__wrapper">

          <div class="text">
            <h2 class="page__section__title">O nas</h2>
            <p>Jesteśmy na rynku od 20 lat. Nasze doświadczenie pozwoli o nam na tworzenie nietypowych mebli tapicerowanych na  yczenie klienta. Zajmujeny sie renowacj  mebli tapicerskich, odnawiamy i zmieniamy obicia mebli codziennego u ytku, wykonujemy meble tapicerowane na zam wienie,  awki do si owni, meble do salon w fryzjerskich i restauracji, zajmujemy sie tapicerką samochodów, obijaniem drzwi.</p>
          </div>


        </div>
        <div class="image">
          <div class="image__img"></div>
          <!-- <img class="image__img" src="img/section_about.jpg" alt=""> -->
        </div>
      </section>

      <section class="page__section section_gallery" id="section_gallery">
        <div class="section__wrapper">
          <h2 class="page__section__title">Galeria prac</h2>
        </div>

        <div class="slider beforeLoad">
          <?php
          $folderGallery = 'section_gallery';
          foreach (array_diff(scandir($folderGallery), array('..', '.')) as $galeria) {
            echo "<li class='slider__element'>";
            echo "<img src='$folderGallery/$galeria'>"; //wyswietla nazwe folderu z linkiem
            echo "</li>";
          }
          ?>
        </div>
        <div class="section__wrapper"></div>
      </section>

      <?php $lang['contact_mail'] = str_replace("@","&#64;",$lang['contact_mail']); //secure mail ?>

      <section class="page__section section_contact" id="section_contact">
        <div id="google_map"></div>
        <div class="section__wrapper">
          <h2 class="page__section__title">Kontakt i dojazd</h2>
          <p>Zapraszamy do kontaktu:</p>
          <p><span>Arkadiusz Perzanowski</span><br><span>Zakład Tapicerski</span></p>
          <p><span class="fa fa-map-marker"></span><a href="<?php echo $lang['contact_gmaps_url1']; ?>" target="_blank">05-300 Targówka,ul. Spacerowa 25 <br>(obok miejscowości Mińsk Mazowiecki)
</a></p>
          <p><span class="fa fa-phone"></span><a href="tel:+48257585114">+48 25-758-51-14</a></p>
          <p><span class="fa fa-phone"></span><a href="tel:+48606387705">+48 606-387-705</a></p>
          <p><span class="fa fa-envelope"></span><span><a href="mail:<?php echo $lang['contact_mail'] ?>"><?php echo $lang['contact_mail'] ?></a></span></p>
        </div>
      </section>

      <footer class="page__section section_footer">
        <div class="section__wrapper">

          <p>
            <span>Copyright &copy; 2018 Zakład Tapicerski Arkadiusz Perzanowski</span>
          </p>

          <p>
            <span>Wszelkie prawa zastrzeżone.</span>
            <span>Realizacja: Studio Citrus - studiocitrus.pl</span>
          </p>

        </div>
      </footer>

    </main>


  </body>
  <script src="lang_export.js"></script>
  <script src="dist/scripts.all.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lobster&amp;subset=latin-ext" rel="stylesheet">
  <script src="https://maps.googleapis.com/maps/api/js?query=spacerowa+25+minsk+mazowiecki&key=AIzaSyBBweORh04qPGsjpO-ib0tVSgxlayRjUoM"></script>


</html>
