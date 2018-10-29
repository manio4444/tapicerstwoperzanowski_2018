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
            <li class="navigation_list_el"><a href="#section_offer">Oferta</a></li>
            <li class="navigation_list_el"><a href="#section_contact">Kontakt</a></li>
          </ul>
        </nav>
        <button class="hamburger hamburger--squeeze" type="button">
          <span class="hamburger-box"><span class="hamburger-inner"></span></span>
        </button>
      </div>
    </header>

    <main class="page__container">

      <section class="page__section section_home" id="section_home">
        <div class="section__background">
        <div class="section__wrapper title">
          <span class="title__pre">Ponad</span>
          <span class="title__big">26 lat doświadczenia</span>
          <span class="title__after">Rodzinna firma z pasją do nadawania drugiego życia przedmiotom codziennego użytku</span>
          <a class="title__anchor" href="#section_about">Dowiedz się więcej</a>
        </div>
      </div>
      </section>

      <section class="page__section section_about" id="section_about">
        <div class="section__wrapper">

          <div class="text">
            <h2 class="page__section__title">O nas</h2>
            <p>Już od 26 lat profesjonalnie zajmujemy się renowacją mebli tapicerskich. Dbamy o zadowolenie naszych niezwykle wymagających klientów. Nie ma przed nami wyzwań, którymi nie podołamy.</p>
            <p>Naszymi najważniejszymi wartościami są jakość, terminowość i profesjonalizm.</p>
            <p>Nasze doświadczenie pozwala nam na tworzenie typowych i nietypowych mebli dla stałych i nowych klientów.</p>
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

      <section class="page__section section_offer" id="section_offer">
        <div class="section__wrapper">
          <h2 class="page__section__title">Oferta</h2>
          <h3 class="page__section__title--sub">W naszej ofercie usługowej znajdują się między innymi:</h3>
          <ul class="section_offer__list list--dotted">
            <li>Renowacja mebli tapicerskich
              <ul>
                <li>Zmiany obicia mebli codziennego użytku</li>
                <li>Naprawa tapicerki samochodowej</li>
                <li>Odrestaurowywanie mebli stylowych i antyków</li>
              </ul>
            </li>

            <li>Wykonujemy meble tapicerskie na zamówienie
              <ul>
                <li>Świadczymy usługi dla restauracji, salonów fryzjerskich i siłowni</li>
                <li>Realizujemy zamówienia tapicerskie projektantów wnętrz</li>
              </ul>
            </li>
          </ul>
        </div>
      </section>

      <?php $lang['contact_mail'] = str_replace("@","&#64;",$lang['contact_mail']); //secure mail ?>

      <section class="page__section section_contact" id="section_contact">
        <div id="google_map"></div>
        <div class="section__wrapper">
          <h2 class="page__section__title">Kontakt i dojazd</h2>
          <h3 class="page__section__title--sub">Zapraszamy do kontaktu:</h3>
          <p><span>Arkadiusz Perzanowski</span><br><span>Zakład Tapicerski</span></p>
          <p><span class="fa fa-map-marker"></span><a href="<?php echo $lang['contact_gmaps_url1']; ?>" target="_blank">05-300 Targówka, ul. Spacerowa 25 <br>(obok miejscowości Mińsk Mazowiecki)</a></p>
          <p><span class="fa fa-phone"></span><a href="tel:+48257585114">+48 25-758-51-14</a></p>
          <p><span class="fa fa-phone"></span><a href="tel:+48606387705">+48 606-387-705</a></p>
          <p><span class="fa fa-envelope"></span><span><a href="mailto:<?php echo $lang['contact_mail'] ?>"><?php echo $lang['contact_mail'] ?></a></span></p>
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
