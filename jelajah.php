<div class="container">
	<div class="isi">
		<div id="map" style="width: 920px; height: 456px">
			<!-- Modal -->
			<div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
			    <div style="height:400px;margin-left:33px;margin-top:10%;" class="modal-content">
			    	<div style="margin-left:33px;border-radius: 3px 3px 0px 0px; " class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					    <div class="container-fluid">
					    	<div class="navbar-header">
					        	<a id="nameBudaya" class="navbar-brand" href="#"></a>
					        </div>
					    </div>
					</div>
					<div class="container-fluid">
					    <div class="row">
					        <div style="border-bottom-left-radius:5px;border-right: 5px solid black;margin-left:34px;" class="col-sm-3 col-md-2 sidebar">
					        	<ul class="nav nav-sidebar">
						            <li><a id="sejarah" style="margin-right:5px;" href="#">Preview</a></li>
						            <li><a id="event" style="margin-right:9px;" href="#">Event</a></li>
						            <li><a id="gal" style="margin-right:9px;" href="#">Galery Foto</a></li>
						            <li><a id="vd" style="margin-right:9px;" href="#">Video</a></li>
					          	</ul>
					        </div>
					        <div style="margin-top:60px;" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
						        <div class="row placeholders">
						        	<div id="budayaConts">
						            </div>
						        </div>
					        </div>
					    </div>
					</div>
			    </div>
			  </div>
			</div>

		</div>
		<script>
            var geoJson1 = reqData('1');
            var geoJson2 = geoJson1.concat(reqData('2'));
           
                L.mapbox.accessToken = 'pk.eyJ1IjoicmlmcWl0aG9taSIsImEiOiJpUjFieHdVIn0.Cz3ME0XeH01-5IRnCJl3SA';
                var map = L.mapbox.map('map', 'rifqithomi.jb5ibjeg')
                    .setView([-1.527, 118.215], 5);

                var myLayer = L.mapbox.featureLayer().addTo(map);

                // Add custom popups to each using our custom feature properties
                myLayer.on('layeradd', function(e) {
                    var marker = e.layer,
                        feature = marker.feature;

                    // Create custom popup content
                    var popupContent =  e.layer.feature.properties.city;

                    // http://leafletjs.com/reference.html#popup
                    marker.setIcon(L.icon(feature.properties.icon));
                    marker.bindPopup(popupContent,{
                        closeButton: false,
                        maxWidth: 300
                    });
                    e.layer.feature.geometry.coordinates.reverse();
                });

                myLayer.on('mouseover', function(e) {
                    e.layer.openPopup();
                });
                myLayer.on('mouseout', function(e) {
                    e.layer.closePopup();
                });

                myLayer.on('dblclick',function(e){
                    map.setView([-1.527, 118.215], 5);
                });
                myLayer.on('click',function(e){
                    if(e.layer.feature.properties.jenis==2)
                    {   $("#budayaConts").html(e.layer.feature.properties.sejarah);
                        $("#sejarah").click(function(){
                            $("#budayaConts").html(e.layer.feature.properties.sejarah);
                        });
                        $("#event").click(function(){
                            $("#budayaConts").html('');
                            for (var i = 0; i< e.layer.feature.properties.event.length;i++){
                                $("#budayaConts").append("<div class='col-lg-3 col-md-4 col-xs-6 thumb'>"+e.layer.feature.properties.event[i].nama_event+"<br/>"+e.layer.feature.properties.event[i].tanggal+"<br/><a onClick='reply_clicks(this.id)' id='detEve"+e.layer.feature.properties.event[i].id_event+"' href='#'>Lihat Detail</a></div>");
                                //$("#budayaConts").append("<input name ='idEv' type='hidden' class='form-control'  value='"+e.layer.feature.properties.event[i].id_event+"' readonly='yes'>");
                            }

                            
                        });
                        $("#gal").click(function(){
                            $("#budayaConts").html('');
                             for (var i = 0; i< e.layer.feature.properties.galery.length;i++){
                                $("#budayaConts").append("<div class='col-lg-3 col-md-4 col-xs-6 thumb'><a class='thumbnail' href='#'><img src='assets/gallery/"+e.layer.feature.id+"/"+e.layer.feature.properties.galery[i].nama_file+".JPG' height='160px' width='240px' alt='"+e.layer.feature.properties.galery[i].nama_gallery+"'></a></div>");
                             }
                            
                        });
                        $("#vd").click(function(){
                            $("#budayaConts").html(e.layer.feature.properties.video);
                        });

                        $('#nameBudaya').html(e.layer.feature.properties.city+"&nbsp;<a style='font-size:12px;' id='detBud' href='#'>Lihat detail</a>");
                        $('#myModal').modal('show'); 

                        $("#detBud").click(function(){
                            $('#myModal').modal('toggle');
                            var delay=200;
                            setTimeout(function(){
                                $("body").removeClass("modal-open");
                                $("#contents").load('detail.php?pages=1&idBud='+e.layer.feature.id);  
                            },delay); 
                            
                        });
                    }
                    
                    map.setView( e.layer.feature.geometry.coordinates,12);  
                });

                // Add features to the map
                myLayer.setGeoJSON(geoJson1);
                map.on('zoomend', function(e) {
                                if (map.getZoom() <= 5) {
                                    myLayer.setGeoJSON(geoJson1);
                                } 
                                else if(map.getZoom() > 5)
                                {
                                    myLayer.setGeoJSON(geoJson2);
                                }
                                
                });


           function reqData(reqNumber){
                var data;
                var qurl = "getData.php";
                var dtkirim = {"req":reqNumber};
                $.ajax({
                            url: qurl,
                            data: dtkirim,
                            async: false,
                            type: "POST",
                            crossDomain: true,
                            dataType: "text",
                            success: function (resp)
                              {
                                data = JSON.parse(resp);
                              }
                        });
                return data;
                
            }
            function reply_clicks(clicked_id)
            {
                var idNoM= clicked_id.replace( /^\D+/g, '');
                $('#myModal').modal('toggle');
                var delay=200;
                setTimeout(function(){
                    $("body").removeClass("modal-open");
                    $("#contents").load('detail.php?pages=2&idEve='+idNoM);  
                },delay);
            }
            
		</script>
        <div class="pemberitahuan">
            aaaaaaaaaaaaa
        </div>
	</div>
</div>