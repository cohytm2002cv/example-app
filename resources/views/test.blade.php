<!DOCTYPE html>
<html>
<head>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMeQor-3OtiEkbzeYqmerHu5tKg2AakBs&libraries=places"></script>
</head>
<body>
  <div id="map" style="height: 400px; width: 100%;"></div>

  <script>
    var map;
    var currentPositionMarker;

    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 0, lng: 0 },
        zoom: 12
      });

      // Lấy vị trí hiện tại sử dụng navigator.geolocation
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var currentLatLng = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };

          // Hiển thị toạ độ hiện tại trên bản đồ
          map.setCenter(currentLatLng);
          currentPositionMarker = new google.maps.Marker({
            position: currentLatLng,
            map: map,
            title: 'Vị trí hiện tại'
          });
        }, function() {
          // Xử lý lỗi nếu không thể lấy vị trí
          alert('Không thể lấy vị trí hiện tại.');
        });
      } else {
        // Trình duyệt không hỗ trợ geolocation
        alert('Trình duyệt của bạn không hỗ trợ geolocation.');
      }
    }
  </script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMeQor-3OtiEkbzeYqmerHu5tKg2AakBs&callback=initMap"></script>
</body>
</html>
