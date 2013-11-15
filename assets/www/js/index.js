/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */
var app = {
    // Application Constructor
    initialize: function() {
        this.bindEvents();
    },
    // Bind Event Listeners
    //
    // Bind any events that are required on startup. Common events are:
    // 'load', 'deviceready', 'offline', and 'online'.
    bindEvents: function() {
        document.addEventListener('deviceready', this.onDeviceReady, false);
    },
    // deviceready Event Handler
    //
    // The scope of 'this' is the event. In order to call the 'receivedEvent'
    // function, we must explicity call 'app.receivedEvent(...);'
    onDeviceReady: function() {
        app.receivedEvent('deviceready');
    },
    // Update DOM on a Received Event
    receivedEvent: function(id) {
        var parentElement = document.getElementById(id);
        var listeningElement = parentElement.querySelector('.listening');
        var receivedElement = parentElement.querySelector('.received');

        listeningElement.setAttribute('style', 'display:none;');
        receivedElement.setAttribute('style', 'display:block;');

        console.log('Received Event: ' + id);
    }
};


	//hostname = "localhost";
			//hostname="10.0.2.2";
			hostname = "naemhd.webfactional.com";

			function view_news() {
				$("#allnews").empty();
				$("#allnews").html('<div id="loadingbar" style="text-align: center;margin-top: 150px;"><img src="images/loading.gif"  /></div>');

				jQuery.ajax({
					type : "POST",
					url : "http://" + hostname + "/imamu/uni_system/view_news.php",
					data : {
						ch_id : 1

					},
					error : function(request, status, error) {
						$("#allnews").html('<div id="loadingbar" style="text-align: center;margin-top: 150px;">لا يوجد اتصال إنترنت</div>');

					}
				}).done(function(msg) {
					//alert(msg);
					$("#allnews").empty();
					//repopulate the list with data from phonegap's device api
					$("#allnews").append($(msg));
					//alert(msg);
					$("#allnews").trigger('create');
					$("#allnews").listview('refresh');

				});
			}

			function view_ads() {
				$("#allads").empty();
				$("#allads").html('<div id="loadingbar" style="text-align: center;margin-top: 150px;"><img src="images/loading.gif"  /></div>');

				jQuery.ajax({
					type : "POST",
					url : "http://" + hostname + "/imamu/uni_system/view_ads.php",
					data : {
						ch_id : 1

					},
					error : function(request, status, error) {
						$("#allads").html('<div id="loadingbar" style="text-align: center;margin-top: 150px;">لا يوجد اتصال إنترنت</div>');

					}
				}).done(function(msg) {
					//alert(msg);
					$("#allads").empty();
					//repopulate the list with data from phonegap's device api
					$("#allads").append($(msg));
					//alert(msg);
					$("#allads").trigger('create');
					$("#allads").listview('refresh');

				});
			}

			function view_ads_desc(id) {
				$("#ads_desc").html('<div id="loadingbar" style="text-align: center;margin-top: 150px;"><img src="images/loading.gif"  /></div>');

				jQuery.ajax({
					type : "POST",
					url : "http://" + hostname + "/imamu/uni_system/view_ads_desc.php",
					data : {
						ads_id : id

					},
					error : function(request, status, error) {
						$("#ads_desc").html('<div id="loadingbar" style="text-align: center;margin-top: 150px;">لا يوجد اتصال إنترنت</div>');
					}
				}).done(function(msg) {
					alert(msg);
					$("#ads_desc").empty();
					$("#loadingbar").remove();
					//repopulate the list with data from phonegap's device api

					$("#ads_desc").empty();

					$("#ads_desc").append($(msg));
					//alert(msg);
					$("#ads_desc").trigger('create');

				});
			}

			function view_news_desc(id) {
				$("#description").html('<div id="loadingbar" style="text-align: center;margin-top: 150px;"><img src="images/loading.gif"  /></div>');

				jQuery.ajax({
					type : "POST",
					url : "http://" + hostname + "/imamu/uni_system/view_news_desc.php",
					data : {
						news_id : id

					},
					error : function(request, status, error) {
						$("#description").html('<div id="loadingbar" style="text-align: center;margin-top: 150px;">لا يوجد اتصال إنترنت</div>');
					}
				}).done(function(msg) {
					//alert(msg);
					$("#description").empty();
					$("#loadingbar").remove();
					//repopulate the list with data from phonegap's device api

					$("#description").empty();

					$("#description").append($(msg));
					//alert(msg);
					$("#description").trigger('create');
					$("#description").listview('refresh');

				});
			}
