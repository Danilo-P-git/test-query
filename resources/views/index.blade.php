<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Maps -->
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps.css'>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps-web.min.js"></script>
    <!-- Maps Services -->
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/services/services-web.min.js"></script>
    <!-- Zoom Control -->
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/ZoomControls/1.0.11/ZoomControls-web.js"></script>
    <link rel='stylesheet' type='text/css'
      href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/ZoomControls/1.0.11/ZoomControls.css'>
    <!-- Pan Controls -->
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/PanControls/1.0.12//PanControls-web.js'></script>
    <link rel='stylesheet' type='text/css'
      href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/PanControls/1.0.12//PanControls.css' />
    <title>TomTom</title>
    <style>
      .marker-icon {
        background-position: center;
        background-size: 22px 22px;
        border-radius: 50%;
        height: 22px;
        left: 4px;
        position: absolute;
        text-align: center;
        top: 3px;
        transform: rotate(45deg);
        width: 22px;
      }

      .marker {
        height: 30px;
        width: 30px;
      }

      .marker-content {
        background: #c30b82;
        border-radius: 50% 50% 50% 0;
        height: 30px;
        left: 50%;
        margin: -15px 0 0 -15px;
        position: absolute;
        top: 50%;
        transform: rotate(-45deg);
        width: 30px;
      }

      .marker-content::before {
        background: #ffffff;
        border-radius: 50%;
        content: "";
        height: 24px;
        margin: 3px 0 0 3px;
        position: absolute;
        width: 24px;
      }

      body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
      }
    </style>
  </head>

  <body>
    <input id="search" type="text" name="search" value="">
    <button id="button-search" class="button" type="button" name="button">Cerca</button>
    {{-- <div id="map" class="map" style="width: 600px; height: 600px;"></div> --}}

    <script src="{{asset("js/app.js")}}"></script>
  </body>

</html>
