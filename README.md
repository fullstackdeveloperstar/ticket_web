login

	-post http://159.203.99.60/api/login
	-request
		email, password, device_token
	-response
		{  
		   "success":true,
		   "user":{  
		      "userId":"1",
		      "password":"$2y$10$t7sVZgFTt0aRlGgXg89Xn.S702Q33HNt932bsRJRue.h.EYmvDMlW",
		      "email":"admin@codeinsect.com",
		      "name":"System Administrator",
		      "roleId":"1",
		      "role":"System Administrator",
		      "user_token":"5afba3fcaa9a9",
		      "user_org_id":"1",
		      "fname":"admin",
		      "lname":"test",
		      "profile_image":"",
		      "createdDtm":"2015-07-01 18:56:49",
		      "org":{  
		         "org_id":"1",
		         "org_email":"testort1@mail.com",
		         "org_name":"test Org",
		         "org_image":"http:\/\/192.168.0.62\/assets\/uploads\/org_image\/test.png",
		         "org_description":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
		         "org_created_dtm":"2018-05-17 19:01:11"
		      }
		   }
		}


signup

	-post http://159.203.99.60/api/signup
	-request 
		fname, lname, email, password, cpassword, device_token
	-response
		{
			"success":false,
			"msg":"User already exists! Please try with other information!"
		}

		{
			"success":true,
			"msg":"Signup is successed",
			"user":
				{
					"userId" :4,
					"email":"tttta@mail.coma",
					"password":"$2y$10$YTQNFWdEkBirxc6RfC96YuqI2RnZd7wmuDfROcDR0YRgn3f\/A3OCK",
					"roleId":3,
					"fname":"Tttt",
					"lname":"Ttttt",
					"role":"Employee",
					"createdBy":-1,
					"user_org_id":"0",
					"createdDtm":"2018-05-17 18:41:45",
					"user_token":"5afdb0c946577",
					"device_token":"aaaa"
				}
		}



forgot password

	-post http://159.203.99.60/api/forgotpassword
	-request
		email
	-response
		{
			"email":"rubby.star@hotmail.com",
			"activation_id":"Nbfo8vrAjnBgDoX",
			"createdDtm":"2018-05-16 05:55:44",
			"agent":"Unidentified User Agent",
			"client_ip":"0.0.0.0",
			"success":true,
			"msg":"Email is sent"
		}

users api

myinfo
	
	-get http://159.203.99.60/api/user/myinfo
	-header
		token
	-response
		{
			"userId":"4",
			"email":"rubby.star@hotmail.com",
			"name":null,
			"fname":"rubby",
			"lname":"star",
			"mobile":null,
			"roleId":"3",
			"user_token":"5afba6d5109e0",
			"profile_image":"http:\/\/localhost\/assets\/uploads\/user_profile\/FA-A39450-2.jpg",
			"device_token":"123123",
			"isDeleted":"0",
			"createdBy":"-1",
			"createdDtm":"2018-05-16 05:34:45",
			"updatedBy":null,
			"updatedDtm":null
		}

update

	-post http://159.203.99.60/api/user/update
	-header 
		token
	-request
		fname, lname, email, profile_image
	-response
		{  
		   "success":true,
		   "msg":"Update success!",
		   "user":[  
		      {  
		         "userId":"4",
		         "password":"$2y$10$i7GqXkpNOuOe2DlmuhHY0uqvAem.s\/1NqVocNgCAmR1pP4ClYwRTW",
		         "email":"test@mail.com",
		         "name":null,
		         "roleId":"3",
		         "role":"Employee",
		         "user_token":"5afba6d5109e0",
		         "fname":"Test",
		         "lname":"Test",
		         "profile_image":"http:\/\/localhost\/assets\/uploads\/user_profile\/323b0e58c3ee3e2f62aa456a868bcd76.jpg",
		         "createdDtm":"2018-05-16 05:34:45"
		      }
		   ]
		}
		or
		{
			"success":false,
			"msg":"All data is required!"
		}
		or
		{
			"success":false,
			"msg":"Update failure!"
		}

update1

	-post http://159.203.99.60/api/user/update1
	-header 
		token
	-request
		fname, lname, email
	-response
		{
			"success":true,
			"msg":"Update success!"
		}
		or
		{
			"success":false,
			"msg":"All data is required!"
		}

upload profile image
	
	-post http://localhost/api/user/uploadprofileimage
	-header
		token
	-request
		profile_image
	-response
		{
			"success":true,
			"msg":"Upload success!"
		}
		

change password
	
	-post http://159.203.99.60/api/user/changepassword
	-header 
		token
	-request
		oldpassword, password, cpassword
	-response
		{
			"success":true,
			"msg":"Password is chnaged"
		}
		or
		{
			"success":false,
			"msg":"Old Password is not mismatched"
		}

tickets and liked event counts
	
	-get http://159.203.99.60/api/user/countticketsandliked
	-header
		token
	-response
		{
			"like_count":1,
			"ticket_count":5,
			"success":true
		}

Event Apis

event list
	
	-get http://159.203.99.60/api/event/getall

	-request
		header: token
	-response
		[  
		   {  
		      "event_id":"1",
		      "event_title":"test Event Title",
		      "event_description":"Our currency rankings show that the most popular Euro exchange rate is the USD to EUR rate. The currency code for Euros is EUR, and the currency symbol is \u20ac.",
		      "event_image":"http:\/\/192.168.0.62\/assets\/uploads\/event_image\/test.png",
		      "event_start_date_time":"2018-05-17 03:00:10",
		      "event_end_date_time":"2018-05-17 04:00:10",
		      "event_address1":"NYC rails 1234",
		      "event_address_2":"New York city , United States",
		      "event_lat":"0",
		      "event_long":"0",
		      "event_org_id":"1",
		      "event_created_dtm":"2018-05-17 19:00:08",
		      "tickets":[  
		         {  
		            "ticket_id":"1",
		            "ticket_type":"type 1",
		            "ticket_price":"12.5",
		            "ticket_counts":"10",
		            "ticket_sold_counts":"2",
		            "ticket_event_id":"1",
		            "ticket_created_dtm":"2018-05-17 14:53:03"
		         }
		      ],
		      "org":{  
		         "org_id":"1",
		         "org_email":"testort1@mail.com",
		         "org_name":"test Org",
		         "org_image":"http:\/\/192.168.0.62\/assets\/uploads\/org_image\/test.png",
		         "org_description":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
		         "org_created_dtm":"2018-05-17 19:01:11"
		      },
		      "is_liked":false
		   },
		   {  
		      "event_id":"2",
		      "event_title":"test Event Title",
		      "event_description":"Our currency rankings show that the most popular Euro exchange rate is the USD to EUR rate. The currency code for Euros is EUR, and the currency symbol is \u20ac.",
		      "event_image":"http:\/\/192.168.0.62\/assets\/uploads\/event_image\/test.png",
		      "event_start_date_time":"2018-05-17 03:00:10",
		      "event_end_date_time":"2018-05-17 04:00:10",
		      "event_address1":"NYC rails 1234",
		      "event_address_2":"New York city , United States",
		      "event_lat":"0",
		      "event_long":"0",
		      "event_org_id":"2",
		      "event_created_dtm":"2018-05-17 19:00:54",
		      "tickets":[  
		         {  
		            "ticket_id":"2",
		            "ticket_type":"type 2",
		            "ticket_price":"13",
		            "ticket_counts":"8",
		            "ticket_sold_counts":"5",
		            "ticket_event_id":"2",
		            "ticket_created_dtm":"2018-05-17 14:53:18"
		         }
		      ],
		      "org":{  
		         "org_id":"2",
		         "org_email":"tesorg2@mail.com",
		         "org_name":"Org 2",
		         "org_image":"http:\/\/192.168.0.62\/assets\/uploads\/org_image\/test.png",
		         "org_description":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
		         "org_created_dtm":"2018-05-17 19:01:23"
		      },
		      "is_liked":true
		   }
		]


liked events list

	-get http://159.203.99.60/api/event/liked
	-header
		token
	-response
		{  
		   "success":true,
		   "events":[  
		      {  
		         "event_id":"2",
		         "event_title":"test Event Title",
		         "event_description":"Our currency rankings show that the most popular Euro exchange rate is the USD to EUR rate. The currency code for Euros is EUR, and the currency symbol is \u20ac.",
		         "event_image":"http:\/\/192.168.0.62\/assets\/uploads\/event_image\/test.png",
		         "event_start_date_time":"2018-05-17 03:00:10",
		         "event_end_date_time":"2018-05-17 04:00:10",
		         "event_address1":"NYC rails 1234",
		         "event_address_2":"New York city , United States",
		         "event_lat":"17.845098",
		         "event_long":"-29.330223",
		         "event_org_id":"2",
		         "event_created_dtm":"2018-05-17 20:37:24",
		         "evl_id":"2",
		         "evl_event_id":"2",
		         "evl_user_id":"4",
		         "evl_created_dtm":"2018-05-17 19:41:45",
		         "tickets":[  
		            {  
		               "ticket_id":"2",
		               "ticket_type":"type 2",
		               "ticket_price":"13",
		               "ticket_counts":"8",
		               "ticket_sold_counts":"5",
		               "ticket_event_id":"2",
		               "ticket_created_dtm":"2018-05-17 14:53:18"
		            }
		         ],
		         "org":{  
		            "org_id":"2",
		            "org_email":"tesorg2@mail.com",
		            "org_name":"Org 2",
		            "org_image":"http:\/\/192.168.0.62\/assets\/uploads\/org_image\/test.png",
		            "org_description":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
		            "org_created_dtm":"2018-05-17 19:01:23"
		         },
		         "is_liked" : true
		      }
		   ]
		}

toggle like
	
	-post http://localhost/api/event/toggle_like
	-header
		token
	-request
		event_id
	-response
		{
			"success":true,
			"msg":"unliked"
		}
		{
			"success":true,
			"msg":"liked"
		}

creat event
	
	-post http://localhost/api/event/create
	-header
		token
	-request
		event_title, event_desscription, event_start_date_time, event_end_date_time,event_address1, event_address2, event_lat, event_lang, event_image
	-response
		{  
		   "success":true,
		   "msg":"Event is created successfully!",
		   "event":{  
		      "event_id":"5",
		      "event_title":"afasd",
		      "event_description":"asdf",
		      "event_image":"http:\/\/localhost\/assets\/uploads\/event_image\/7dd67f9a88d5c925092943b5af599beb.jpg",
		      "event_start_date_time":"2018-5-3",
		      "event_end_date_time":"2018-5-3",
		      "event_address1":"asdf",
		      "event_address_2":"asdf",
		      "event_lat":"2134",
		      "event_long":"2234",
		      "event_org_id":"12",
		      "event_created_dtm":"2018-05-20 04:18:30"
		   }
		}

org apis

create org

	-post http://localhost/api/org/create
	-header
		token
	-request 
		org_email, org_name, org_description, org_image
	-response
		{
			"success":false,
			"msg":"Organizer is already exist"
		}
		{  
		   "success":true,
		   "msg":"Organizer is created successfully!",
		   "org":{  
		      "org_id":"12",
		      "org_email":"test@mail.com",
		      "org_name":"test",
		      "org_image":"http:\/\/localhost\/assets\/uploads\/org_image\/d5ca862c9b1a19186357cb4843eb4786.jpg",
		      "org_description":"test",
		      "org_created_dtm":"2018-05-20 02:39:42"
		   }
		}


Ticket apis

create ticket

	-post http://localhost/api/ticket/create
	-header 
		token
	-request
		ticket_type, ticket_price, ticket_counts, ticket_event_id
	-response
		{
			"success":true,
			"msg":"Ticket is created successfully"
		}