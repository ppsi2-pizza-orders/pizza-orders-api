<?php

/**
 * @OA\Info(
 *      version="0.1.0",
 *      title="Pizza Orders",
 *      description="Pizza orders api documentation",
 * )
 * @OA\SecurityScheme(
 *      securityScheme="Authorization header",
 *      type="http",
 *      scheme="bearer",
 *      bearerFormat="JWT"
 * )
 */

/**
 * @OA\Post(
 *      path="/auth/refresh",
 *      tags={"Auth"},
 *      security={{"Authorization header": {}}},
 *      description="Refreshing expired token",
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                      "data":{"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9waXp6YS1vcmRlcnMtYXBpLnRlc3RcL2F1dGhcL3JlZnJlc2giLCJpYXQiOjE1NDU1ODUwNzIsImV4cCI6MTU0NTU4NTY5MywibmJmIjoxNTQ1NTg1NjMzLCJqdGkiOiJFd0kxQ0Q4TWFVWWJmbkxuIiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3IiwidXNlciI6eyJpZCI6MSwibmFtZSI6IkphbiBLb3dhbHNraSIsImVtYWlsIjoiZXhhbXBsZUBleGFtcGxlLmNvbSIsImFkbWluIjoxLCJyZXN0YXVyY[]W50cyI6W119fQ.y--F2lcPvl1QnNVHH3951xKHRYzWNjIZtE3f8VfntII"},"meta":{},"messages":{"Token refreshed"}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Post(
 *      path="/auth/register",
 *      tags={"Auth"},
 *      summary="Registering new user",
 *      description="Registering new user",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                   "email": "example@example.com",
 *                   "password": "secret",
 *                   "password_confirmation": "secret"
 *                 }
 *             )
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                   "data":{"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODA4MFwvYXV0aFwvcmVnaXN0ZXIiLCJpYXQiOjE1NDQzOTE5OTksImV4cCI6MTU0NDM5NTU5OSwibmJmIjoxNTQ0MzkxOTk5LCJqdGkiOiI4QWtMVTJRY3NEU2dQOGEzIiwic3ViIjozLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3IiwidXNlciI6eyJpZCI6MywibmFtZSI6ImUiLCJlbWFpbCI6ImVAZS5wbCIsImFkbWluIjowfX0.tCZw7ssL-9DJKAeRTvr9Z8oMAmwXVj21Qd9dNbEPoec"},"meta":{},"messages":{"Zarejestrowano pomyślnie"}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Post(
 *      path="/auth/facebook",
 *      tags={"Auth"},
 *      summary="Facebook login",
 *      description="Returns app access_token by FB access_token",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                   "access_token": "VALID_FB_ACCESS_TOKEN",
 *                 }
 *             )
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                   "data":{"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODA4MFwvYXV0aFwvZmFjZWJvb2siLCJpYXQiOjE1NDQzOTE3ODEsImV4cCI6MTU0NDM5NTM4MSwibmJmIjoxNTQ0MzkxNzgxLCJqdGkiOiJCSlk5YnF4ZG5GT3N4YkxDIiwic3ViIjoyLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3IiwidXNlciI6eyJpZCI6MiwibmFtZSI6Ik1hdGV1c3ogTGVuY2tpIiwiZW1haWwiOiJtYXRldXN6LmxlbmNraUBnbWFpbC5jb20iLCJhZG1pbiI6MH19.lTEWHzxV75ZyDwG3SKsp9UnaNrZ7DndPIXtw5lW--Fk"},"meta":{},"messages":{"Pomyślnie zalogowano przez Facebooka"}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Post(
 *      path="/auth/login",
 *      tags={"Auth"},
 *      summary="App login",
 *      description="Returns login access token",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                   "email": "example@example.com",
 *                   "password": "test123",
 *                 }
 *             )
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                  example={
 *                      "data":{"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODA4MFwvYXV0aFwvbG9naW4iLCJpYXQiOjE1NDQzOTE1MTAsImV4cCI6MTU0NDM5NTExMCwibmJmIjoxNTQ0MzkxNTEwLCJqdGkiOiI1Q0E2dWgyNGhncEJRRHVLIiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3IiwidXNlciI6eyJpZCI6MSwibmFtZSI6IkphbiBLb3dhbHNraSIsImVtYWlsIjoiZXhhbXBsZUBleGFtcGxlLmNvbSIsImFkbWluIjoxfX0.H3pMw8NplBrZQI5E9ILAhdsQH64RXnvQb2SephPSWZo"},"meta":{},"messages":{"Zalogowano pomyślnie"}
 *                  }
 *             )
 *         )
 *     ),
 *     )
 */


/**
 * @OA\Get(
 *      path="/admin/users",
 *      tags={"Admin"},
 *      summary="Users table",
 *      description="Returns admin table of users",
 *      security={{"Authorization header": {}}},
 *      @OA\Parameter(
 *         name="orderBy",
 *         in="query",
 *         description="Orders ascending data set by given column name",
 *         @OA\Schema(
 *             type="string",
 *             example="name"
 *         )
 *      ),
 *      @OA\Parameter(
 *         name="orderByDesc",
 *         in="query",
 *         description="Orders descending data set by given column name",
 *         @OA\Schema(
 *             type="string",
 *             example=""
 *         )
 *      ),
 *      @OA\Parameter(
 *         name="search",
 *         in="query",
 *         description="Filters data set by given value",
 *         @OA\Schema(
 *             type="string",
 *             example="Jan"
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                      "data":{{"id":1,"name":"Jan Kowalski","email":"example@example.com","provider":"app"},{"id":2,"name":"Mateusz Lencki","email":"mateusz.lencki@gmail.com","provider":"facebook"},{"id":3,"name":"e","email":"e@e.pl","provider":"app"},{"id":4,"name":"example","email":"example@exampdle.com","provider":"app"}},"meta":{"columns":{{"name":"id","label":"id","sortable":true,"searchable":false},{"name":"name","label":"name","sortable":true,"searchable":true},{"name":"email","label":"email","sortable":true,"searchable":true},{"name":"provider","label":"provider","sortable":true,"searchable":true}},"paginator":{"current_page":1,"last_page":1}},"messages":{}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */


/**
 * @OA\Get(
 *      path="/admin/restaurants",
 *      tags={"Admin"},
 *      summary="Restaurants table",
 *      description="Returns admin table of restaurants",
 *      security={{"Authorization header": {}}},
 *      @OA\Parameter(
 *         name="orderBy",
 *         in="query",
 *         description="Orders ascending data set by given column name",
 *         @OA\Schema(
 *             type="string",
 *             example="name"
 *         )
 *      ),
 *      @OA\Parameter(
 *         name="orderByDesc",
 *         in="query",
 *         description="Orders descending data set by given column name",
 *         @OA\Schema(
 *             type="string",
 *             example=""
 *         )
 *      ),
 *      @OA\Parameter(
 *         name="search",
 *         in="query",
 *         description="Filters data set by given value",
 *         @OA\Schema(
 *             type="string",
 *             example="Legnica"
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                      "data":{{"id":1,"name":"Accusamus.","city":"East Godfreytown","address":"874 Hauck Rapids Suite 231","phone":"(403) 486-2122","photo":"storage/restaurants/noimage.jpg","description":"Dignissimos explicabo sunt eos vel magnam ipsa consequatur quam tenetur autem est sunt in occaecati rerum dignissimos suscipit temporibus exercitationem et inventore eos consequatur.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":2,"name":"Aut pariatur autem.","city":"New Katarina","address":"29270 Leslie Meadow Suite 032","phone":"(427) 568-9666 x11272","photo":"storage/restaurants/noimage.jpg","description":"Numquam reprehenderit nihil doloribus iusto voluptatem quidem nostrum aliquid totam officiis.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":3,"name":"Similique.","city":"Coltonmouth","address":"17892 Kuphal Turnpike Apt. 220","phone":"265-410-3833","photo":null,"description":"Beatae nemo veniam rerum ratione officia dolores quia possimus soluta dolore aperiam qui vero quo placeat reprehenderit veniam libero at ratione.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":4,"name":"Debitis pariatur illum.","city":"East Darrenstad","address":"749 Vaughn Islands Suite 098","phone":"(774) 715-7847 x11469","photo":null,"description":"At ea atque perferendis voluptatem exercitationem libero enim placeat quia quia illum.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":5,"name":"Dolore.","city":"Lake Michaleland","address":"6452 Larson Square","phone":"(358) 397-5629 x1850","photo":null,"description":"Asperiores iure est repellendus voluptatem est quae aliquam sit nam.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":6,"name":"Incidunt et ad.","city":"Judyside","address":"26763 Aubree Passage Suite 705","phone":"(903) 707-6084","photo":null,"description":"Quod aut deleniti non hic in aut corporis maiores unde occaecati nemo atque fuga labore.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":7,"name":"Quaerat.","city":"West Karen","address":"353 Heidenreich Plain","phone":"+1 (809) 863-6615","photo":null,"description":"Et et delectus numquam quisquam vel voluptas sed quisquam at culpa quia iste non esse laboriosam non aperiam molestiae eveniet rerum incidunt.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":8,"name":"Eum et.","city":"New Clemmiechester","address":"64550 Rolfson Highway Suite 712","phone":"(813) 613-7120 x98422","photo":null,"description":"In nihil libero tenetur voluptatem rerum quia fugiat dicta architecto quis non consequatur ut nam quia illo distinctio.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":9,"name":"Vitae enim.","city":"New Octavia","address":"335 Alexzander Extension Suite 773","phone":"883-753-7723 x74325","photo":null,"description":"Ea optio ut cupiditate at eius aut et facilis vel culpa odio qui iusto et eveniet.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":10,"name":"Sed soluta.","city":"Port Daphne","address":"863 Bonnie Mission Suite 511","phone":"+1-730-941-5041","photo":null,"description":"Enim autem eum laboriosam dolores necessitatibus tempore quae minima est libero.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":11,"name":"Aut et.","city":"Skilesville","address":"777 Josh Pines","phone":"512.683.0476 x9657","photo":null,"description":"Ducimus adipisci rerum qui fuga est quam velit architecto est voluptas tenetur ut molestiae veniam excepturi eos distinctio error id et.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":12,"name":"Ratione sint minus.","city":"Romainestad","address":"181 Kessler Forks","phone":"614-903-7705 x32162","photo":null,"description":"Sed magni est tempora porro sit tempore repellendus rerum ratione id veritatis saepe aperiam aliquam quidem.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":13,"name":"Quasi natus.","city":"Amandaport","address":"180 Jerome Forge","phone":"398-201-2229","photo":null,"description":"Nostrum enim qui atque laudantium quam a consequuntur quas maxime possimus repellat consequatur doloribus et a deserunt rerum ut minima.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":14,"name":"Nisi soluta.","city":"South Carlee","address":"393 Funk Manors","phone":"(309) 431-6344 x28655","photo":null,"description":"Nam hic voluptas aliquam quo corrupti quam excepturi eveniet sit quae illo magni asperiores laboriosam quam dolor deleniti assumenda.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":15,"name":"Nisi aperiam et.","city":"Schmidtstad","address":"26570 Rempel Rapid","phone":"+1-239-269-9792","photo":null,"description":"Aut maiores sint maiores sunt dolor quibusdam officiis blanditiis voluptates alias occaecati inventore quia qui qui voluptatem iusto ipsa voluptatum qui.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":16,"name":"Modi molestiae beatae.","city":"Aydenville","address":"23936 Jerome Way Suite 511","phone":"+17358267346","photo":null,"description":"Molestias rem sit praesentium itaque est qui aut iste minima soluta qui nihil sunt hic eum itaque.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":17,"name":"Blanditiis.","city":"East Erick","address":"811 Rory Plain Suite 735","phone":"(374) 341-0505","photo":null,"description":"Qui ea ad magnam quam inventore quam deleniti ducimus qui labore minus.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":18,"name":"Expedita laudantium.","city":"West Bessie","address":"7383 Winston Tunnel Apt. 591","phone":"297-808-8125 x37117","photo":null,"description":"Repellendus nesciunt sunt quibusdam dolores repellendus necessitatibus quia molestiae commodi quia quod a et eum fugit iure.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":19,"name":"Praesentium eius dolores est.","city":"Parisianborough","address":"6927 Parker Point","phone":"1-598-627-8046 x94237","photo":null,"description":"Ut ut pariatur veniam fugit qui provident quo atque doloribus aut reprehenderit debitis repudiandae.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":20,"name":"In.","city":"Derickhaven","address":"735 Doyle Fields Suite 517","phone":"825-369-9198 x69342","photo":null,"description":"Laboriosam optio corrupti accusamus aliquid sed totam fugiat illo sit natus molestiae inventore.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":21,"name":"Voluptatem assumenda nisi.","city":"Abeborough","address":"9575 Feil Route","phone":"606-523-6679 x085","photo":null,"description":"Sed et amet voluptatem vel consequatur esse voluptatum.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":22,"name":"Ut tenetur soluta.","city":"Elroyburgh","address":"14473 Cronin Meadow Suite 499","phone":"518.779.0361 x3898","photo":null,"description":"Ea eum sunt tempore et explicabo asperiores voluptatem saepe.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":23,"name":"Voluptatum molestiae sit harum.","city":"Kreigerchester","address":"683 Schiller Islands Apt. 742","phone":"1-346-271-6206","photo":null,"description":"Nostrum quam reiciendis soluta enim totam qui harum doloremque.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":24,"name":"Ut sint.","city":"South Lilianshire","address":"8309 Block Street Suite 320","phone":"(986) 200-2265","photo":null,"description":"Sint nesciunt praesentium accusamus quia molestiae qui facere molestias rem reiciendis dolorem.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}},{"id":25,"name":"Aspernatur aperiam et est.","city":"Effertzchester","address":"81863 Christy Highway","phone":"1-221-917-5880","photo":null,"description":"Magni aliquid delectus atque aut occaecati ea placeat fuga odio hic dolores et error.","created_at":"2018-12-09 21:14:09","owner":{"id":1,"name":"Jan Kowalski"}}},"meta":{"columns":{{"name":"id","label":"id","sortable":true,"searchable":false},{"name":"name","label":"name","sortable":true,"searchable":true},{"name":"city","label":"city","sortable":true,"searchable":true},{"name":"address","label":"address","sortable":true,"searchable":true},{"name":"phone","label":"phone","searchable":true},{"name":"description","label":"description","searchable":true},{"name":"created_at","label":"created_at","sortable":true},{"name":"owner","label":"owner"}},"paginator":{"current_page":1,"last_page":2}},"messages":{}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Get(
 *      path="/admin/ingredients",
 *      tags={"Admin"},
 *      summary="Ingredients table",
 *      description="Returns admin table of ingredients",
 *      security={{"Authorization header": {}}},
 *      @OA\Parameter(
 *         name="orderBy",
 *         in="query",
 *         description="Orders ascending data set by given column name",
 *         @OA\Schema(
 *             type="string",
 *             example="name"
 *         )
 *      ),
 *      @OA\Parameter(
 *         name="orderByDesc",
 *         in="query",
 *         description="Orders descending data set by given column name",
 *         @OA\Schema(
 *             type="string",
 *             example=""
 *         )
 *      ),
 *      @OA\Parameter(
 *         name="search",
 *         in="query",
 *         description="Filters data set by given value",
 *         @OA\Schema(
 *             type="string",
 *             example="cheese"
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                      "data":{{"id":1,"name":"sauce","image":null},{"id":2,"name":"cheese","image":null},{"id":3,"name":"mushrooms","image":null},{"id":4,"name":"salami","image":null},{"id":5,"name":"ham","image":null},{"id":6,"name":"chicken","image":null}},"meta":{"columns":{{"name":"id","label":"id","sortable":true},{"name":"name","label":"name","sortable":true,"searchable":true},{"name":"image","label":"image"}},"paginator":{"current_page":1,"last_page":1}},"messages":{}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Get(
 *      path="/admin/orders",
 *      tags={"Admin"},
 *      summary="Orders table",
 *      description="Returns admin table of orders",
 *      security={{"Authorization header": {}}},
 *      @OA\Parameter(
 *         name="orderBy",
 *         in="query",
 *         description="Orders ascending data set by given column name",
 *         @OA\Schema(
 *             type="string",
 *             example=""
 *         )
 *      ),
 *      @OA\Parameter(
 *         name="orderByDesc",
 *         in="query",
 *         description="Orders descending data set by given column name",
 *         @OA\Schema(
 *             type="string",
 *             example=""
 *         )
 *      ),
 *      @OA\Parameter(
 *         name="search",
 *         in="query",
 *         description="Filters data set by given value",
 *         @OA\Schema(
 *             type="string",
 *             example=""
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                     "data":{{"id":2,"token":"AnUD8OUFXapccnrC","email":"admin@example.com","restaurant":"Smaczna Pizza","city":"Sosnowiec","status":"finished","delivery_address":"Piastowska 1 Legnica","phone_number":"123456789","created_at":"2018-12-28 17:26:07","pizzas":{{"price":"15,00","description":"Custom Pizza: sos pomidorowy, ser, szynka","type":"custom"},{"price":"14,00","description":"Pizza 'Margherita': sos pomidorowy, ser","type":"menu"}}},{"id":3,"token":"GlwXpX54kaQr0mrl","email":"admin@example.com","restaurant":"Smaczna Pizza","city":"Sosnowiec","status":"new","delivery_address":"Piastowska 1 Legnica","phone_number":"123456789","created_at":"2018-12-28 17:30:35","pizzas":{{"price":"15,00","description":"Custom Pizza: sos pomidorowy, ser, szynka","type":"custom"},{"price":"14,00","description":"Pizza 'Margherita': sos pomidorowy, ser","type":"menu"},{"price":"29,00","description":"Zmodyfikowana 'Margherita': sos pomidorowy, ser + ( sos pomidorowy, ser, szynka )","type":"menu_customized"}}},{"id":4,"token":"JAJy13AJ9NCNXNcb","email":"admin@example.com","restaurant":"Smaczna Pizza","city":"Sosnowiec","status":"new","delivery_address":"Piastowska 1 Legnica","phone_number":"123456789","created_at":"2018-12-28 17:30:52","pizzas":{{"price":"15,00","description":"Własna Pizza: sos pomidorowy, ser, szynka","type":"custom"},{"price":"14,00","description":"Pizza 'Margherita': sos pomidorowy, ser","type":"menu"},{"price":"29,00","description":"Zmodyfikowana 'Margherita': sos pomidorowy, ser + ( sos pomidorowy, ser, szynka )","type":"menu_customized"}}},{"id":5,"token":"0By8uAXQJ0tjvoAV","email":"owner@example.com","restaurant":"Smaczna Pizza","city":"Sosnowiec","status":"realization","delivery_address":"Piastowska 1 Legnica","phone_number":"123456789","created_at":"2018-12-28 18:04:32","pizzas":{{"price":"15,00","description":"Własna Pizza: sos pomidorowy, ser, szynka","type":"custom"},{"price":"14,00","description":"Pizza 'Margherita': sos pomidorowy, ser","type":"menu"},{"price":"29,00","description":"Zmodyfikowana 'Margherita': sos pomidorowy, ser + ( sos pomidorowy, ser, szynka )","type":"menu_customized"}}},{"id":6,"token":"Yi6e11jaQA0W5L4X","email":"owner@example.com","restaurant":"Smaczna Pizza","city":"Sosnowiec","status":"new","delivery_address":"Długa 12 Legnica","phone_number":"123341111","created_at":"2018-12-28 18:26:48","pizzas":{{"price":"15,00","description":"Własna Pizza: sos pomidorowy, ser, szynka","type":"custom"},{"price":"14,00","description":"Pizza 'Margherita': sos pomidorowy, ser","type":"menu"},{"price":"29,00","description":"Zmodyfikowana 'Margherita': sos pomidorowy, ser + ( sos pomidorowy, ser, szynka )","type":"menu_customized"}}},{"id":7,"token":"pb7K1nVx7lRISeYy","email":"client@example.com","restaurant":"Smaczna Pizza","city":"Sosnowiec","status":"new","delivery_address":"Długa 12 Legnica","phone_number":"123341111","created_at":"2018-12-28 18:34:13","pizzas":{{"price":"15,00","description":"Własna Pizza: sos pomidorowy, ser, szynka","type":"custom"},{"price":"14,00","description":"Pizza 'Margherita': sos pomidorowy, ser","type":"menu"},{"price":"29,00","description":"Zmodyfikowana 'Margherita': sos pomidorowy, ser + ( sos pomidorowy, ser, szynka )","type":"menu_customized"}}}},"meta":{"columns":{{"name":"id","label":"id","sortable":true,"searchable":false},{"name":"token","label":"token","sortable":true,"searchable":true},{"name":"email","label":"email","sortable":false,"searchable":false},{"name":"restaurant","label":"re","sortable":false,"searchable":false},{"name":"city","label":"city","sortable":false,"searchable":false},{"name":"status","label":"status","sortable":true,"searchable":true},{"name":"delivery_address","label":"delivery address","sortable":true,"searchable":true},{"name":"phone_number","label":"phone number","sortable":true,"searchable":true},{"name":"created_at","label":"created at","sortable":true,"searchable":false}},"paginator":{"current_page":1,"last_page":1}},"messages":{}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Post(
 *      path="/admin/restaurant/{id}/publish",
 *      tags={"Admin"},
 *      description="Sets restaurant 'confirmed' status to true. Makes it visible for customers.",
 *      security={{"Authorization header": {}}},
 *      @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Id of restaurant",
 *         @OA\Schema(
 *             type="int",
 *             example=1
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={"data":{},"meta":{},"messages":{"Status restauracji został pomyślnie zmieniony na publiczny"}}
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Post(
 *      path="/admin/restaurant/{id}/hide",
 *      tags={"Admin"},
 *      description="Sets restaurant 'confirmed' status to false. Makes it invisible for customers.",
 *      security={{"Authorization header": {}}},
 *      @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Id of restaurant",
 *         @OA\Schema(
 *             type="int",
 *             example=1
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={"data":{},"meta":{},"messages":{"Status restauracji został pomyślnie zmieniony na niezatwierdzony"}}
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Get(
 *      path="/restaurants",
 *      tags={"Restaurant"},
 *      description="Returns names and cities of registered restaurants",
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                      "data":{"names":{"Accusamus.","Aut pariatur autem.","Similique.","Debitis pariatur illum.","Dolore.","Incidunt et ad.","Quaerat.","Eum et.","Vitae enim.","Sed soluta.","Aut et.","Ratione sint minus.","Quasi natus.","Nisi soluta.","Nisi aperiam et.","Modi molestiae beatae.","Blanditiis.","Expedita laudantium.","Praesentium eius dolores est.","In.","Voluptatem assumenda nisi.","Ut tenetur soluta.","Voluptatum molestiae sit harum.","Ut sint.","Aspernatur aperiam et est.","Cum est.","Ut.","Quidem dignissimos molestiae.","Molestiae ut nulla.","Molestiae non provident.","Sed saepe.","Aut mollitia minus.","Nihil eos animi.","Sint earum.","Ut voluptatum.","Occaecati quia nostrum.","Necessitatibus deleniti sit.","Maxime saepe cumque.","Iusto error cumque.","Vitae tempore quos.","Autem aut.","Qui.","Voluptatum.","Dolore unde.","Labore est sed.","Nostrum ex cupiditate voluptate magnam.","Sed.","Ut.","Rem tempore quidem.","Ab omnis adipisci."},"cities":{"East Godfreytown","New Katarina","Coltonmouth","East Darrenstad","Lake Michaleland","Judyside","West Karen","New Clemmiechester","New Octavia","Port Daphne","Skilesville","Romainestad","Amandaport","South Carlee","Schmidtstad","Aydenville","East Erick","West Bessie","Parisianborough","Derickhaven","Abeborough","Elroyburgh","Kreigerchester","South Lilianshire","Effertzchester","New Timmyburgh","North Ciarafort","West Kenton","North Letitia","Lake Walter","South Taurean","Ludwigtown","Haleyview","Cameronmouth","Chanelside","South Imanimouth","Mckennamouth","Hoppeburgh","Leilaniberg","Port Tyreekfort","Nicolasside","Nolanborough","Wuckertton","North Jaronport","South Gianniport","South Beryl","Herminiatown","West Immanuel","West Christashire","Goldnerland"}},"meta":{},"messages":{}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Post(
 *      path="/restaurants",
 *      tags={"Restaurant"},
 *      description="Returns restaurants filtered by search fields",
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                   "searchName": "Da Grasso",
 *                   "searchCity": "Legnica",
 *                 }
 *             )
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                     "data":{{"id":1,"name":"Accusamus.","city":"East Godfreytown","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":2,"name":"Aut pariatur autem.","city":"New Katarina","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":3,"name":"Similique.","city":"Coltonmouth","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":4,"name":"Debitis pariatur illum.","city":"East Darrenstad","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":5,"name":"Dolore.","city":"Lake Michaleland","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":6,"name":"Incidunt et ad.","city":"Judyside","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":7,"name":"Quaerat.","city":"West Karen","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":8,"name":"Eum et.","city":"New Clemmiechester","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":9,"name":"Vitae enim.","city":"New Octavia","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":10,"name":"Sed soluta.","city":"Port Daphne","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":11,"name":"Aut et.","city":"Skilesville","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":12,"name":"Ratione sint minus.","city":"Romainestad","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":13,"name":"Quasi natus.","city":"Amandaport","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":14,"name":"Nisi soluta.","city":"South Carlee","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":15,"name":"Nisi aperiam et.","city":"Schmidtstad","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":16,"name":"Modi molestiae beatae.","city":"Aydenville","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":17,"name":"Blanditiis.","city":"East Erick","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":18,"name":"Expedita laudantium.","city":"West Bessie","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":19,"name":"Praesentium eius dolores est.","city":"Parisianborough","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":20,"name":"In.","city":"Derickhaven","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":21,"name":"Voluptatem assumenda nisi.","city":"Abeborough","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":22,"name":"Ut tenetur soluta.","city":"Elroyburgh","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":23,"name":"Voluptatum molestiae sit harum.","city":"Kreigerchester","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":24,"name":"Ut sint.","city":"South Lilianshire","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":25,"name":"Aspernatur aperiam et est.","city":"Effertzchester","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":26,"name":"Cum est.","city":"New Timmyburgh","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":27,"name":"Ut.","city":"North Ciarafort","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":28,"name":"Quidem dignissimos molestiae.","city":"West Kenton","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":29,"name":"Molestiae ut nulla.","city":"North Letitia","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":30,"name":"Molestiae non provident.","city":"Lake Walter","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":31,"name":"Sed saepe.","city":"South Taurean","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":32,"name":"Aut mollitia minus.","city":"Ludwigtown","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":33,"name":"Nihil eos animi.","city":"Haleyview","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":34,"name":"Sint earum.","city":"Cameronmouth","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":35,"name":"Ut voluptatum.","city":"Chanelside","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":36,"name":"Occaecati quia nostrum.","city":"South Imanimouth","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":37,"name":"Necessitatibus deleniti sit.","city":"Mckennamouth","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":38,"name":"Maxime saepe cumque.","city":"Hoppeburgh","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":39,"name":"Iusto error cumque.","city":"Leilaniberg","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":40,"name":"Vitae tempore quos.","city":"Port Tyreekfort","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":41,"name":"Autem aut.","city":"Nicolasside","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":42,"name":"Qui.","city":"Nolanborough","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":43,"name":"Voluptatum.","city":"Wuckertton","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":44,"name":"Dolore unde.","city":"North Jaronport","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":45,"name":"Labore est sed.","city":"South Gianniport","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":46,"name":"Nostrum ex cupiditate voluptate magnam.","city":"South Beryl","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":47,"name":"Sed.","city":"Herminiatown","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":48,"name":"Ut.","city":"West Immanuel","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":49,"name":"Rem tempore quidem.","city":"West Christashire","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}},{"id":50,"name":"Ab omnis adipisci.","city":"Goldnerland","pizzas":{{"name":"Margherita"},{"name":"Fungi"},{"name":"Salami"},{"name":"Capriciosa"},{"name":"Chicken"}}}},"meta":{},"messages":{}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Get(
 *      path="/restaurant/{id}",
 *      tags={"Restaurant"},
 *      description="Returns restaurant's details",
 *      @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Id of restaurant",
 *         @OA\Schema(
 *             type="int",
 *             example=1
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                     "data":{"id":13,"name":"Quasi natus.","city":"Amandaport","address":"180 Jerome Forge","phone":"398-201-2229","photo":null,"description":"Nostrum enim qui atque laudantium quam a consequuntur quas maxime possimus repellat consequatur doloribus et a deserunt rerum ut minima.","created_at":{"date":"2018-12-09 21:14:09.000000","timezone_type":3,"timezone":"UTC"},"owner_id":{"id":1,"name":"Jan Kowalski"},"pizzas":{{"id":1,"name":"Margherita","price":14,"image":null},{"id":2,"name":"Fungi","price":18,"image":null},{"id":3,"name":"Salami","price":20,"image":null},{"id":4,"name":"Capriciosa","price":23,"image":null},{"id":5,"name":"Chicken","price":21.38,"image":null}},"reviews":{{"id":38,"base_rating":1,"ingredients_rating":5,"delivery_time_rating":4,"comment":"Quae sunt.","created_at":{"date":"2018-12-09 21:14:10.000000","timezone_type":3,"timezone":"UTC"},"user_id":{"id":1,"name":"Jan Kowalski"}},{"id":81,"base_rating":1,"ingredients_rating":1,"delivery_time_rating":5,"comment":"Et sint occaecati eius et vitae voluptas maiores voluptates voluptas.","created_at":{"date":"2018-12-09 21:14:10.000000","timezone_type":3,"timezone":"UTC"},"user_id":{"id":1,"name":"Jan Kowalski"}},{"id":97,"base_rating":3,"ingredients_rating":3,"delivery_time_rating":4,"comment":"Quisquam ut sint est exercitationem voluptatum vel voluptate.","created_at":{"date":"2018-12-09 21:14:10.000000","timezone_type":3,"timezone":"UTC"},"user_id":{"id":1,"name":"Jan Kowalski"}},{"id":138,"base_rating":4,"ingredients_rating":1,"delivery_time_rating":3,"comment":"Tempore commodi adipisci autem in atque omnis molestiae omnis nobis quas.","created_at":{"date":"2018-12-09 21:14:10.000000","timezone_type":3,"timezone":"UTC"},"user_id":{"id":1,"name":"Jan Kowalski"}},{"id":185,"base_rating":2,"ingredients_rating":4,"delivery_time_rating":5,"comment":"Illum maiores sunt sapiente quisquam a ut consequatur.","created_at":{"date":"2018-12-09 21:14:10.000000","timezone_type":3,"timezone":"UTC"},"user_id":{"id":1,"name":"Jan Kowalski"}},{"id":305,"base_rating":1,"ingredients_rating":5,"delivery_time_rating":5,"comment":"Voluptatem eum.","created_at":{"date":"2018-12-09 21:14:10.000000","timezone_type":3,"timezone":"UTC"},"user_id":{"id":1,"name":"Jan Kowalski"}},{"id":312,"base_rating":3,"ingredients_rating":5,"delivery_time_rating":2,"comment":"Consequuntur cumque consequatur.","created_at":{"date":"2018-12-09 21:14:10.000000","timezone_type":3,"timezone":"UTC"},"user_id":{"id":1,"name":"Jan Kowalski"}},{"id":351,"base_rating":2,"ingredients_rating":4,"delivery_time_rating":5,"comment":"Recusandae harum quas omnis qui rerum modi corporis odit omnis quis nemo fugiat.","created_at":{"date":"2018-12-09 21:14:10.000000","timezone_type":3,"timezone":"UTC"},"user_id":{"id":1,"name":"Jan Kowalski"}}}},"meta":{},"messages":{}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Get(
 *      path="/restaurant/{id}/ingredients",
 *      tags={"Restaurant"},
 *      description="Returns ingredients in restaurant",
 *      @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Id of restaurant",
 *         @OA\Schema(
 *             type="int",
 *             example=1
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={"data":{{"id":1,"name":"dodatkowy ser","price":4,"available":true,"image":"http://pizza-orders-api.test/storage/ingredients/layers/additional_cheese.png","thumbnail":"http://pizza-orders-api.test/storage/ingredients/thumbnails/additional_cheese.png","index":1},{"id":2,"name":"szynka","price":8,"available":true,"image":"http://pizza-orders-api.test/storage/ingredients/layers/ham.png","thumbnail":"http://pizza-orders-api.test/storage/ingredients/thumbnails/ham.png","index":2},{"id":3,"name":"mozzarella","price":7,"available":true,"image":"http://pizza-orders-api.test/storage/ingredients/layers/mozzarella.png","thumbnail":"http://pizza-orders-api.test/storage/ingredients/thumbnails/mozzarella.png","index":3},{"id":4,"name":"salami","price":6,"available":true,"image":"http://pizza-orders-api.test/storage/ingredients/layers/salami.png","thumbnail":"http://pizza-orders-api.test/storage/ingredients/thumbnails/salami.png","index":4},{"id":5,"name":"pepperoni","price":8,"available":true,"image":"http://pizza-orders-api.test/storage/ingredients/layers/sausage.png","thumbnail":"http://pizza-orders-api.test/storage/ingredients/thumbnails/sausage.png","index":5},{"id":6,"name":"czerwona cebula","price":5,"available":true,"image":"http://pizza-orders-api.test/storage/ingredients/layers/red_onion.png","thumbnail":"http://pizza-orders-api.test/storage/ingredients/thumbnails/red_onion.png","index":6},{"id":7,"name":"czerwona papryka","price":4,"available":true,"image":"http://pizza-orders-api.test/storage/ingredients/layers/red_pepper.png","thumbnail":"http://pizza-orders-api.test/storage/ingredients/thumbnails/red_pepper.png","index":7},{"id":8,"name":"pieczarki","price":8,"available":true,"image":"http://pizza-orders-api.test/storage/ingredients/layers/mushroom.png","thumbnail":"http://pizza-orders-api.test/storage/ingredients/thumbnails/mushroom.png","index":8},{"id":9,"name":"pomidory","price":4,"available":true,"image":"http://pizza-orders-api.test/storage/ingredients/layers/tomato.png","thumbnail":"http://pizza-orders-api.test/storage/ingredients/thumbnails/tomato.png","index":9},{"id":10,"name":"papryczki chili","price":4,"available":true,"image":"http://pizza-orders-api.test/storage/ingredients/layers/chili.png","thumbnail":"http://pizza-orders-api.test/storage/ingredients/thumbnails/chili.png","index":10},{"id":11,"name":"oliwki czarne","price":5,"available":true,"image":"http://pizza-orders-api.test/storage/ingredients/layers/black_olive.png","thumbnail":"http://pizza-orders-api.test/storage/ingredients/thumbnails/black_olive.png","index":11},{"id":12,"name":"oliwki zielone","price":5,"available":true,"image":"http://pizza-orders-api.test/storage/ingredients/layers/green_olive.png","thumbnail":"http://pizza-orders-api.test/storage/ingredients/thumbnails/green_olive.png","index":12}},"meta":{},"messages":{}}
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Post(
 *      path="/restaurant",
 *      tags={"Restaurant"},
 *      description="Register new restaurant",
 *      security={{"Authorization header": {}}},
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={"name":"Super Pizza","city":"Sosnowiec","address":"Długa 21","phone":"997"}
 *             )
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                      "data":{"id":52,"name":"Super Pizza","city":"Sosnowiec","address":"Długa 21","phone":"997","photo":"storage/restaurants/noimage.jpg","description":null,"created_at":{"date":"2018-12-09 22:02:25.000000","timezone_type":3,"timezone":"UTC"},"owner_id":{"id":1,"name":"Jan Kowalski"},"pizzas":{},"reviews":{}},"meta":{},"messages":{"Restauracja została stworzona"}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Patch(
 *      path="/restaurant/{id}",
 *      tags={"Restaurant"},
 *      description="Edit existing restaurant",
 *      security={{"Authorization header": {}}},
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={"name":"Super Pizza","city":"Katowice","address":"Długa 21","phone":"997"}
 *             )
 *         )
 *      ),
 *      @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Id of restaurant",
 *         @OA\Schema(
 *             type="int",
 *             example=1
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                      "data":{"id":1,"name":"Super Pizza","city":"Katowice","address":"Długa 21","phone":"997","photo":"storage/restaurants/noimage.jpg","description":null,"created_at":{"date":"2018-12-09 22:02:25.000000","timezone_type":3,"timezone":"UTC"},"owner_id":{"id":1,"name":"Jan Kowalski"},"pizzas":{},"reviews":{}},"meta":{},"messages":{"Restauracja została zaktualizowana"}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */


/**
 * @OA\Delete(
 *      path="/restaurant/{id}",
 *      tags={"Restaurant"},
 *      description="Deletes restaurant",
 *      security={{"Authorization header": {}}},
 *      @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Id of restaurant",
 *         @OA\Schema(
 *             type="int",
 *             example=1
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                     "data":{},"meta":{},"messages":{"Restaurant deleted"}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Post(
 *      path="/restaurant/{id}/pizza",
 *      tags={"Pizza"},
 *      description="Add pizza to restaurant menu",
 *      security={{"Authorization header": {}}},
 *      @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Id of restaurant",
 *         @OA\Schema(
 *             type="int",
 *             example=1
 *         )
 *      ),
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={"price":30,"name":"Pizza dobra taka nie za słodka","ingredients":{1,2,5}}
 *             )
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={"data":{"id":10,"name":"Pizza dobra taka nie za słodka","price":"30,00","ingredients":{{"id":1,"name":"dodatkowy ser","image":"http://pizza-orders-api.test/storage/ingredients/layers/additional_cheese.png","thumbnail":"http://pizza-orders-api.test/storage/ingredients/thumbnails/additional_cheese.png","index":1},{"id":2,"name":"szynka","image":"http://pizza-orders-api.test/storage/ingredients/layers/ham.png","thumbnail":"http://pizza-orders-api.test/storage/ingredients/thumbnails/ham.png","index":2},{"id":5,"name":"pepperoni","image":"http://pizza-orders-api.test/storage/ingredients/layers/sausage.png","thumbnail":"http://pizza-orders-api.test/storage/ingredients/thumbnails/sausage.png","index":5}}},"meta":{},"messages":{"Pizza dodana"}}
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Patch(
 *      path="/restaurant/{restaurant_id}/pizza/{id}",
 *      tags={"Pizza"},
 *      description="Edit pizza",
 *      security={{"Authorization header": {}}},
 *      @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Id of pizza",
 *         @OA\Schema(
 *             type="int",
 *             example=1
 *         )
 *      ),
 *      @OA\Parameter(
 *         name="restaurant_id",
 *         in="path",
 *         description="Restaurant id",
 *         @OA\Schema(
 *             type="int",
 *             example=1
 *         )
 *      ),
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={"name":"Funghi","price":25}
 *             )
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                     "data":{"id":1,"name":"Funghi","price":25,"image":"/storage/pizzas/noimage.jpg"},"meta":{},"messages":{"Pizza zaktualizowana"}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Delete(
 *      path="/restaurant/{restaurant_id}/pizza/{id}",
 *      tags={"Pizza"},
 *      description="Deletes pizza",
 *      security={{"Authorization header": {}}},
 *      @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Id of pizza",
 *         @OA\Schema(
 *             type="int",
 *             example=1
 *         )
 *      ),
 *      @OA\Parameter(
 *         name="restaurant_id",
 *         in="path",
 *         description="Restaurant id",
 *         @OA\Schema(
 *             type="int",
 *             example=1
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                     "data":{},"meta":{},"messages":{"Pizza usunięta"}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Post(
 *     path="/ingredient",
 *     tags={"Ingredient"},
 *     description="Create ingredient",
 *     security={{"Authorization header": {}}},
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={"name":"Ser", "image": "{layer image file}", "thumbnail": "{thumbnail file}", "index": "optional layer z-index"}
 *             )
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                     "data":{"id":1,"name":"Ser","image":"storage/ingredients/noimage.jpg","thumbnail":"storage/ingredients/noimage.jpg", "index": 1},"meta":{},"messages":{"Składnik został dodany"}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Patch(
 *     path="/ingredient/{id}",
 *     tags={"Ingredient"},
 *     description="Create ingredient",
 *     security={{"Authorization header": {}}},
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={"name":"Serek"}
 *             )
 *         )
 *      ),
 *      @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Id of ingredient",
 *         @OA\Schema(
 *             type="int",
 *             example=1
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                     "data":{"id":1,"name":"Serek","image":"storage/ingredients/noimage.jpg"},"meta":{},"messages":{"Składnik został zaktualizowany"}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Delete(
 *      path="/ingredient/{id}",
 *      tags={"Ingredient"},
 *      description="Deletes ingredient",
 *      security={{"Authorization header": {}}},
 *      @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Id of ingredient",
 *         @OA\Schema(
 *             type="int",
 *             example=1
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                     "data":{},"meta":{},"messages":{"Składnik został usunięty"}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Post(
 *      path="/restaurant/{id}/review",
 *      tags={"Review"},
 *      description="Add review",
 *      security={{"Authorization header": {}}},
 *      @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Id of restaurant",
 *         @OA\Schema(
 *             type="int",
 *             example=1
 *         )
 *      ),
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={"base_rating":5, "ingredients_rating":5, "delivery_time_rating":5, "comment": "Fajne"}
 *             )
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                      "data":{"id":1,"base_rating":5,"ingredients_rating":5,"delivery_time_rating":5,"comment":"Fajne","created_at":{"date":"2018-12-09 22:34:07.000000","timezone_type":3,"timezone":"UTC"},"user_id":{"id":1,"name":"Jan Kowalski"}},"meta":{},"messages":{"Restauracja oceniona"}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Delete(
 *      path="/review/{id}",
 *      tags={"Review"},
 *      description="Delete review",
 *      security={{"Authorization header": {}}},
 *      @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Id of review",
 *         @OA\Schema(
 *             type="int",
 *             example=1
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                     "data":{},"meta":{},"messages":{"Pizza została usunięta"}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */


/**
 * @OA\Post(
 *      path="/restaurant/{id}/grant",
 *      tags={"Owner"},
 *      description="Add user to restaurant",
 *      security={{"Authorization header": {}}},
 *      @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Id of restaurant",
 *         @OA\Schema(
 *             type="int",
 *             example=1
 *         )
 *      ),
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={"email":"janusz@example.com", "role":"1-3"}
 *             )
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                     "data":{},"meta":{},"messages":{"Użytkownik dodany do restauracji"}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Delete(
 *      path="/restaurant/{id}/revoke/{user_id}",
 *      tags={"Owner"},
 *      description="Remove user from restaurant",
 *      security={{"Authorization header": {}}},
 *      @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Id of restaurant",
 *         @OA\Schema(
 *             type="int",
 *             example=1
 *         )
 *      ),
 *      @OA\Parameter(
 *         name="user_id",
 *         in="path",
 *         description="Id of user",
 *         @OA\Schema(
 *             type="int",
 *             example=1
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                     "data":{},"meta":{},"messages":{"Użytkownik został usunięty z restauracji"}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Post(
 *      path="/restaurant/{id}/publish/request",
 *      tags={"Owner"},
 *      description="Sets restaurant 'visible' status to true.",
 *      security={{"Authorization header": {}}},
 *      @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Id of restaurant",
 *         @OA\Schema(
 *             type="int",
 *             example=1
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={"data":{},"meta":{},"messages":{"Zapytanie zostało pomyślnie wysłane"}}
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Post(
 *      path="/restaurant/{id}/publish/cancel",
 *      tags={"Owner"},
 *      description="Sets restaurant 'visible' and 'confirmed' status to false. Makes restaurant invisible for customers.",
 *      security={{"Authorization header": {}}},
 *      @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Id of restaurant",
 *         @OA\Schema(
 *             type="int",
 *             example=1
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={"data":{},"meta":{},"messages":{"Status został zmieniony na prywatn"}}
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Post(
 *      path="/order",
 *      tags={"Order"},
 *      description="Place order",
 *      security={{"Authorization header": {}}},
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={"restaurant_id":1,"delivery_address":"Długa 12 Legnica","phone_number":"123341111","pizzas":{{"ingredients":{1,2,5}},{"id":1},{"id":1,"ingredients":{1,2,5}}}}
 *             )
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                     "data":{"id":6,"token":"Yi6e11jaQA0W5L4X","status":"new","price":"58,00","delivery_address":"Długa 12 Legnica","phone_number":"123341111","pizzas":{{"price":"15,00","description":"Własna Pizza: sos pomidorowy, ser, szynka","type":"custom"},{"price":"14,00","description":"Pizza 'Margherita': sos pomidorowy, ser","type":"menu"},{"price":"29,00","description":"Zmodyfikowana 'Margherita': sos pomidorowy, ser + ( sos pomidorowy, ser, szynka )","type":"menu_customized"}}},"meta":{},"messages":{"Zamówienie zostało złożone"}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Get(
 *      path="/order/{token}",
 *      tags={"Order"},
 *      description="Get order",
 *      security={{"Authorization header": {}}},
 *      @OA\Parameter(
 *         name="token",
 *         in="path",
 *         description="Token of order",
 *         @OA\Schema(
 *             type="string",
 *             example="pb7K1nVx7lRISeYy"
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                      "data":{"id":7,"token":"pb7K1nVx7lRISeYy","status":"new","price":"58,00","delivery_address":"Długa 12 Legnica","phone_number":"123341111","pizzas":{{"price":"15,00","description":"Własna Pizza: sos pomidorowy, ser, szynka","type":"custom"},{"price":"14,00","description":"Pizza 'Margherita': sos pomidorowy, ser","type":"menu"},{"price":"29,00","description":"Zmodyfikowana 'Margherita': sos pomidorowy, ser + ( sos pomidorowy, ser, szynka )","type":"menu_customized"}}},"meta":{},"messages":{}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Get(
 *      path="/restaurant/{id}/orders",
 *      tags={"Order"},
 *      description="Get orders in restaurant",
 *      security={{"Authorization header": {}}},
 *      @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID of restaurant",
 *         @OA\Schema(
 *             type="int",
 *             example=1
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                      "data":{{"id":2,"token":"AnUD8OUFXapccnrC","status":"new","price":"29,00","delivery_address":"Piastowska 1 Legnica","phone_number":"123456789","pizzas":{{"price":"15,00","description":"Custom Pizza: sos pomidorowy, ser, szynka","type":"custom"},{"price":"14,00","description":"Pizza 'Margherita': sos pomidorowy, ser","type":"menu"}}},{"id":3,"token":"GlwXpX54kaQr0mrl","status":"new","price":"58,00","delivery_address":"Piastowska 1 Legnica","phone_number":"123456789","pizzas":{{"price":"15,00","description":"Custom Pizza: sos pomidorowy, ser, szynka","type":"custom"},{"price":"14,00","description":"Pizza 'Margherita': sos pomidorowy, ser","type":"menu"},{"price":"29,00","description":"Zmodyfikowana 'Margherita': sos pomidorowy, ser + ( sos pomidorowy, ser, szynka )","type":"menu_customized"}}},{"id":4,"token":"JAJy13AJ9NCNXNcb","status":"new","price":"58,00","delivery_address":"Piastowska 1 Legnica","phone_number":"123456789","pizzas":{{"price":"15,00","description":"Własna Pizza: sos pomidorowy, ser, szynka","type":"custom"},{"price":"14,00","description":"Pizza 'Margherita': sos pomidorowy, ser","type":"menu"},{"price":"29,00","description":"Zmodyfikowana 'Margherita': sos pomidorowy, ser + ( sos pomidorowy, ser, szynka )","type":"menu_customized"}}},{"id":5,"token":"0By8uAXQJ0tjvoAV","status":"realization","price":"58,00","delivery_address":"Piastowska 1 Legnica","phone_number":"123456789","pizzas":{{"price":"15,00","description":"Własna Pizza: sos pomidorowy, ser, szynka","type":"custom"},{"price":"14,00","description":"Pizza 'Margherita': sos pomidorowy, ser","type":"menu"},{"price":"29,00","description":"Zmodyfikowana 'Margherita': sos pomidorowy, ser + ( sos pomidorowy, ser, szynka )","type":"menu_customized"}}},{"id":6,"token":"Yi6e11jaQA0W5L4X","status":"new","price":"58,00","delivery_address":"Długa 12 Legnica","phone_number":"123341111","pizzas":{{"price":"15,00","description":"Własna Pizza: sos pomidorowy, ser, szynka","type":"custom"},{"price":"14,00","description":"Pizza 'Margherita': sos pomidorowy, ser","type":"menu"},{"price":"29,00","description":"Zmodyfikowana 'Margherita': sos pomidorowy, ser + ( sos pomidorowy, ser, szynka )","type":"menu_customized"}}},{"id":7,"token":"pb7K1nVx7lRISeYy","status":"new","price":"58,00","delivery_address":"Długa 12 Legnica","phone_number":"123341111","pizzas":{{"price":"15,00","description":"Własna Pizza: sos pomidorowy, ser, szynka","type":"custom"},{"price":"14,00","description":"Pizza 'Margherita': sos pomidorowy, ser","type":"menu"},{"price":"29,00","description":"Zmodyfikowana 'Margherita': sos pomidorowy, ser + ( sos pomidorowy, ser, szynka )","type":"menu_customized"}}}},"meta":{},"messages":{}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Post(
 *      path="/order/{token}/status/next",
 *      tags={"Order"},
 *      description="Changes order status",
 *      security={{"Authorization header": {}}},
 *      @OA\Parameter(
 *         name="token",
 *         in="path",
 *         description="Token of order",
 *         @OA\Schema(
 *             type="string",
 *             example="AnUD8OUFXapccnrC"
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={
 *                     "data":{"id":2,"token":"AnUD8OUFXapccnrC","status":"realization","price":"29,00","delivery_address":"Piastowska 1 Legnica","phone_number":"123456789","pizzas":{{"price":"15,00","description":"Custom Pizza: sos pomidorowy, ser, szynka","type":"custom"},{"price":"14,00","description":"Pizza 'Margherita': sos pomidorowy, ser","type":"menu"}}},"meta":{},"messages":{"Status zamówienia został zmieniony"}
 *                 }
 *             )
 *         )
 *     ),
 *     )
 */

/**
 * @OA\Post(
 *      path="/restaurant/{id}/manage",
 *      tags={"Manager"},
 *      description="Ingredient managing",
 *      security={{"Authorization header": {}}},
 *      @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="id of restaurant",
 *         @OA\Schema(
 *             type="string",
 *             example=1
 *         )
 *      ),
 *      @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={"ingredient_id":1,"available":120,"price":4}
 *             )
 *         )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="success",
 *          @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 example={"data":{},"meta":{},"messages":{"Skadnik został zapisany"}}
 *             )
 *         )
 *     ),
 *     )
 */

