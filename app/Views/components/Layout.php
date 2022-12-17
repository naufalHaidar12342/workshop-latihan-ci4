<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8" />
  <meta name="description" content="Fashi Template" />
  <meta name="keywords" content="Fashi, unica, creative, html" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Toko Online || Workshop BK</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />

  <!-- Css Styles -->
  <link rel="stylesheet" href="<?= base_url("/css/bootstrap.min.css") ?>" type="text/css" />
  <link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="/css/themify-icons.css" type="text/css" />
  <link rel="stylesheet" href="/css/elegant-icons.css" type="text/css" />
  <link rel="stylesheet" href="/css/owl.carousel.min.css" type="text/css" />
  <link rel="stylesheet" href="/css/nice-select.css" type="text/css" />
  <link rel="stylesheet" href="/css/jquery-ui.min.css" type="text/css" />
  <link rel="stylesheet" href="/css/slicknav.min.css" type="text/css" />
  <link rel="stylesheet" href="/css/style.css" type="text/css" />
</head>

<body>
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>

  <?= $this->include("/components/navbar"); ?>
  <?= $this->renderSection("konten-website"); ?>
  <?= $this->include("/components/footer"); ?>



  <!-- Js Plugins -->
  <script src="/js/jquery-3.3.1.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/jquery-ui.min.js"></script>
  <script src="/js/jquery.countdown.min.js"></script>
  <script src="/js/jquery.nice-select.min.js"></script>
  <script src="/js/jquery.zoom.min.js"></script>
  <script src="/js/jquery.dd.min.js"></script>
  <script src="/js/jquery.slicknav.js"></script>
  <script src="/js/owl.carousel.min.js"></script>
  <script src="/js/main.js"></script>
  <script>
    $('document').ready(function() {
      var jumlah_pembelian = 1;
      var harga = <?= $barang->harga ?>;
      var ongkir = 0;
      $("#provinsi").on('change', function() {
        $("#kabupaten").empty();
        var id_province = $(this).val();
        $.ajax({
          url: "<?= site_url('shop/getcity') ?>",
          type: 'GET',
          data: {
            'id_province': id_province,
          },
          dataType: 'json',
          success: function(data) {
            console.log(data);
            var results = data["rajaongkir"]["results"];
            for (var i = 0; i < results.length; i++) {
              $("#kabupaten").append($('<option>', {
                value: results[i]["city_id"],
                text: results[i]['city_name']
              }));
            }
          },

        });
      });

      $("#kabupaten").on('change', function() {
        var id_city = $(this).val();
        $.ajax({
          url: "<?= site_url('shop/getcost') ?>",
          type: 'GET',
          data: {
            'origin': 154,
            'destination': id_city,
            'weight': 1000,
            'courier': 'jne'
          },
          dataType: 'json',
          success: function(data) {
            console.log(data);
            var results = data["rajaongkir"]["results"][0]["costs"];
            for (var i = 0; i < results.length; i++) {
              var text = results[i]["description"] + "(" + results[i]["service"] + ")";
              $("#service").append($('<option>', {
                value: results[i]["cost"][0]["value"],
                text: text,
                etd: results[i]["cost"][0]["etd"]
              }));
            }
          },

        });
      });

      $("#service").on('change', function() {
        var estimasi = $('option:selected', this).attr('etd');
        ongkir = parseInt($(this).val());
        $("#ongkir").val(ongkir);
        $("#estimasi").html(estimasi + " Hari");
        var total_harga = (jumlah_pembelian * harga) + ongkir;
        $("#total_harga").val(total_harga);
      });

      $("#jumlah").on("change", function() {
        jumlah_pembelian = $("#jumlah").val();
        var total_harga = (jumlah_pembelian * harga) + ongkir;
        $("#total_harga").val(total_harga);
      });
    });
  </script>
</body>

</html>