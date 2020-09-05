<!----- Jquery ----->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<!----- Slick ----->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!----- Popper ----->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<!----- Bootstrap JS ----->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<!-- Lazy load -->
<script src="{{ asset('assets/js/lazysizes.min.js') }}" async=""></script>

<script>

  function getPricelists()
  {
    var motor_id = $("#uang_muka option:selected").attr("data-id");
    var uang_muka = $("#uang_muka option:selected").attr("data-uang");
    
    $.ajax({
      type: "get",
      url: '/api/product/'+motor_id+'/'+uang_muka+'',
      dataType: 'json',
      success:function(data){
        $.each(data, function(i, data) {
          $('#diskon').html('Rp ' + data.diskon + ',-');
          $('#tenor_cicilan').html(`
            <option value="` +data.bulan_11+ `">Bulan 11 x Rp ` +data.bulan_11+ `</option>
            <option value="` +data.bulan_11+ `">Bulan 17 x Rp ` +data.bulan_17+ `</option>
            <option value="` +data.bulan_11+ `">Bulan 23 x Rp ` +data.bulan_23+ `</option>
            <option value="` +data.bulan_11+ `">Bulan 27 x Rp ` +data.bulan_27+ `</option>
            <option value="` +data.bulan_11+ `">Bulan 29 x Rp ` +data.bulan_29+ `</option>
            <option value="` +data.bulan_11+ `">Bulan 33 x Rp ` +data.bulan_33+ `</option>
            <option value="` +data.bulan_11+ `">Bulan 35 x Rp ` +data.bulan_35+ `</option>
          `);
        }); 
      },
      error:function(respone){
        console.log(respone);
      }
    });
  }
  
</script>