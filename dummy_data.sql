INSERT INTO Users VALUES
    ("admin", "admin@truthordare.com", "12345"),
    ("johnny", "johnnyb5@gmail.com", "coolpass"),
    ("jimmy", "jimbo@gmail.com", "anotherpass"),
    ("jane", "janeaire@gmail.com", "numb3r"),
    ("bigbrain5", "bigbrain@gmail.com", "3214"),
    ("daremaster5000", "dares@gmail.com", "billy"),
    ("telleroftruth", "tellero@gmail.com", "mydogsname"),
    ("fred", "fred595@gmail.com", "59ik84h"),
    ("susieq", "susi456@gmail.com", "password"),
    ("acdc", "rockband4@gmail.com", "hackmeidareya");

INSERT INTO Groups VALUES
    (NULL, "Global", "admin"),
    (NULL, "OSU Boys", "johnny"),
    (NULL, "OSU Gals", "jane"),
    (NULL, "Truth/Dare Team 1", "daremaster5000"),
    (NULL, "Truth/Dare Team 2", "telleroftruth"),
    (NULL, "Falafel Lovers", "fred"),
    (NULL, "Truth for trees", "susieq"),
    (NULL, "A creative name", "jimmy"),
    (NULL, "An interesting name", "jimmy"),
    (NULL, "A boring name", "jimmy");

INSERT INTO MemberOf VALUES
    ("admin", 1, 0),
    ("johnny", 1, 0),
    ("jimmy", 2, 0),
    ("jane", 3, 0),
    ("bigbrain5", 4, 0),
    ("daremaster5000", 1, 0),
    ("telleroftruth", 2, 0),
    ("fred", 2, 0),
    ("susieq", 3, 0),
    ("acdc", 5, 0),
    ("johnny", 5, 0),
    ("jane", 6, 0);

INSERT INTO DarePrompts VALUES
    (NULL, 0, "Do a backflip", "johnny"),
    (NULL, 0, "Eat a tablespoon of cinnamon", "jimmy"),
    (NULL, 0, "Wear a cape to work", "susieq"),
    (NULL, 0, "Make a five person human pyramid", "fred"),
    (NULL, 0, "Hit a bullseye with a bow and arrow", "daremaster5000"),
    (NULL, 0, "Buy a friend a puppy", "jane"),
    (NULL, 0, "Climb a tall tree", "acdc"),
    (NULL, 0, "Eat frog legs", "bigbrain5"),
    (NULL, 0, "Do a wheelie on a bike", "johnny"),
    (NULL, 0, "Benchpress your significant other", "fred");

INSERT INTO TruthPrompts VALUES
    (NULL, 0, "What is your cringiest middle school memory?", "johnny"),
    (NULL, 0, "Write about the single moment you felt most alive.", "jimmy"),
    (NULL, 0, "If you put pineapple on pizza: why?", "susieq"),
    (NULL, 0, "What's the meanest thing you've ever told someone?", "fred"),
    (NULL, 0, "What's the most clever way you've cheated on something?", "telleroftruth"),
    (NULL, 0, "What illegal thing did you manage to get away with?", "jane"),
    (NULL, 0, "Favorite childhood memory.", "acdc"),
    (NULL, 0, "Which politician do you honestly think you could take in a fistfight?", "bigbrain5"),
    (NULL, 0, "Describe your perfect dinner.", "johnny"),
    (NULL, 0, "Argue for a US policy update that would make the most impact.", "fred");

INSERT INTO DareResponses VALUES
    (1, "johnny", "https://images.pexels.com/photos/104827/cat-pet-animal-domestic-104827.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500", 0),
    (2, "jimmy", "https://cdn.pixabay.com/photo/2014/11/30/14/11/kitty-551554__340.jpg", 10),
    (1, "daremaster5000", "https://cdn.pixabay.com/photo/2015/11/16/14/43/cat-1045782_960_720.jpg", 15),
    (3, "telleroftruth", "https://static01.nyt.com/images/2019/09/04/business/04chinaclone-01/merlin_160087014_de761d9a-4360-402d-a15b-ddeff775760d-articleLarge.jpg?quality=75&auto=webp&disable=upscale", 20),
    (1, "bigbrain5", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSP0Tc6iFF0ysE_R62rkZTwznJ1V9CcLREoZqAtTTYFdR_xHeeHA&s", 5),
    (2, "bigbrain5", "https://imgix.bustle.com/uploads/getty/2018/4/13/5268bf1a-f786-4743-9474-6614fec8638c-getty-915821408.jpg?w=970&h=546&fit=crop&crop=faces&auto=format&q=70", 2),
    (5, "acdc", "https://images2.minutemediacdn.com/image/upload/c_crop,h_1347,w_2400,x_0,y_17/f_auto,q_auto,w_1100/v1572194246/shape/mentalfloss/87226-gettyimages-537121731.jpg", 1),
    (5, "jane", "https://media.boingboing.net/wp-content/uploads/2019/02/cats.jpg", 0),
    (8, "susieq", "https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/cat-quotes-1543599392.jpg?crop=1.00xw:0.759xh;0,0&resize=480:*", 3),
    (6, "jane", "https://imgix.bustle.com/uploads/getty/2019/10/29/1017f954-f049-41b8-8017-f3ebac940571-getty-1183300336.jpg?w=1020&h=576&fit=crop&crop=faces&auto=format&q=70", 5),
    (5, "johnny", "https://peopledotcom.files.wordpress.com/2019/05/new-grumpy-cat.jpg?w=1930&h=2700", 40);

INSERT INTO TruthResponses VALUES
    (1, "johnny", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum. Vulputate odio ut enim blandit. Ornare arcu odio ut sem nulla pharetra diam. Ac turpis egestas integer eget aliquet nibh praesent tristique. Fermentum leo vel orci porta non pulvinar neque laoreet. Eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada. Magna etiam tempor orci eu lobortis elementum nibh. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant. Tellus at urna condimentum mattis. Vitae justo eget magna fermentum iaculis. Posuere morbi leo urna molestie at. Diam ut venenatis tellus in metus vulputate eu scelerisque felis. Vulputate ut pharetra sit amet. ", 23),
    (2, "jimmy", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum. Vulputate odio ut enim blandit. Ornare arcu odio ut sem nulla pharetra diam. Ac turpis egestas integer eget aliquet nibh praesent tristique. Fermentum leo vel orci porta non pulvinar neque laoreet. Eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada. Magna etiam tempor orci eu lobortis elementum nibh. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant. Tellus at urna condimentum mattis. Vitae justo eget magna fermentum iaculis. Posuere morbi leo urna molestie at. Diam ut venenatis tellus in metus vulputate eu scelerisque felis. Vulputate ut pharetra sit amet. ", 12),
    (1, "daremaster5000", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum. Vulputate odio ut enim blandit. Ornare arcu odio ut sem nulla pharetra diam. Ac turpis egestas integer eget aliquet nibh praesent tristique. Fermentum leo vel orci porta non pulvinar neque laoreet. Eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada. Magna etiam tempor orci eu lobortis elementum nibh. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant. Tellus at urna condimentum mattis. Vitae justo eget magna fermentum iaculis. Posuere morbi leo urna molestie at. Diam ut venenatis tellus in metus vulputate eu scelerisque felis. Vulputate ut pharetra sit amet. ", 43),
    (3, "telleroftruth", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum. Vulputate odio ut enim blandit. Ornare arcu odio ut sem nulla pharetra diam. Ac turpis egestas integer eget aliquet nibh praesent tristique. Fermentum leo vel orci porta non pulvinar neque laoreet. Eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada. Magna etiam tempor orci eu lobortis elementum nibh. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant. Tellus at urna condimentum mattis. Vitae justo eget magna fermentum iaculis. Posuere morbi leo urna molestie at. Diam ut venenatis tellus in metus vulputate eu scelerisque felis. Vulputate ut pharetra sit amet. ", 2),
    (1, "bigbrain5", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum. Vulputate odio ut enim blandit. Ornare arcu odio ut sem nulla pharetra diam. Ac turpis egestas integer eget aliquet nibh praesent tristique. Fermentum leo vel orci porta non pulvinar neque laoreet. Eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada. Magna etiam tempor orci eu lobortis elementum nibh. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant. Tellus at urna condimentum mattis. Vitae justo eget magna fermentum iaculis. Posuere morbi leo urna molestie at. Diam ut venenatis tellus in metus vulputate eu scelerisque felis. Vulputate ut pharetra sit amet. ", 1),
    (2, "bigbrain5", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum. Vulputate odio ut enim blandit. Ornare arcu odio ut sem nulla pharetra diam. Ac turpis egestas integer eget aliquet nibh praesent tristique. Fermentum leo vel orci porta non pulvinar neque laoreet. Eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada. Magna etiam tempor orci eu lobortis elementum nibh. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant. Tellus at urna condimentum mattis. Vitae justo eget magna fermentum iaculis. Posuere morbi leo urna molestie at. Diam ut venenatis tellus in metus vulputate eu scelerisque felis. Vulputate ut pharetra sit amet. ", 234),
    (5, "acdc", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum. Vulputate odio ut enim blandit. Ornare arcu odio ut sem nulla pharetra diam. Ac turpis egestas integer eget aliquet nibh praesent tristique. Fermentum leo vel orci porta non pulvinar neque laoreet. Eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada. Magna etiam tempor orci eu lobortis elementum nibh. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant. Tellus at urna condimentum mattis. Vitae justo eget magna fermentum iaculis. Posuere morbi leo urna molestie at. Diam ut venenatis tellus in metus vulputate eu scelerisque felis. Vulputate ut pharetra sit amet. ", 34),
    (5, "jane", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum. Vulputate odio ut enim blandit. Ornare arcu odio ut sem nulla pharetra diam. Ac turpis egestas integer eget aliquet nibh praesent tristique. Fermentum leo vel orci porta non pulvinar neque laoreet. Eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada. Magna etiam tempor orci eu lobortis elementum nibh. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant. Tellus at urna condimentum mattis. Vitae justo eget magna fermentum iaculis. Posuere morbi leo urna molestie at. Diam ut venenatis tellus in metus vulputate eu scelerisque felis. Vulputate ut pharetra sit amet. ", 5),
    (8, "susieq", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum. Vulputate odio ut enim blandit. Ornare arcu odio ut sem nulla pharetra diam. Ac turpis egestas integer eget aliquet nibh praesent tristique. Fermentum leo vel orci porta non pulvinar neque laoreet. Eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada. Magna etiam tempor orci eu lobortis elementum nibh. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant. Tellus at urna condimentum mattis. Vitae justo eget magna fermentum iaculis. Posuere morbi leo urna molestie at. Diam ut venenatis tellus in metus vulputate eu scelerisque felis. Vulputate ut pharetra sit amet. ", 14),
    (6, "jane", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum. Vulputate odio ut enim blandit. Ornare arcu odio ut sem nulla pharetra diam. Ac turpis egestas integer eget aliquet nibh praesent tristique. Fermentum leo vel orci porta non pulvinar neque laoreet. Eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada. Magna etiam tempor orci eu lobortis elementum nibh. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant. Tellus at urna condimentum mattis. Vitae justo eget magna fermentum iaculis. Posuere morbi leo urna molestie at. Diam ut venenatis tellus in metus vulputate eu scelerisque felis. Vulputate ut pharetra sit amet. ", 89),
    (5, "johnny", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum. Vulputate odio ut enim blandit. Ornare arcu odio ut sem nulla pharetra diam. Ac turpis egestas integer eget aliquet nibh praesent tristique. Fermentum leo vel orci porta non pulvinar neque laoreet. Eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada. Magna etiam tempor orci eu lobortis elementum nibh. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant. Tellus at urna condimentum mattis. Vitae justo eget magna fermentum iaculis. Posuere morbi leo urna molestie at. Diam ut venenatis tellus in metus vulputate eu scelerisque felis. Vulputate ut pharetra sit amet. ", 23);

INSERT INTO DareGroup VALUES
    (4, 1),
    (2, 5),
    (8, 4),
    (1, 9),
    (8, 2),
    (3, 2),
    (1, 3),
    (1, 5),
    (1, 4),
    (3, 1);

INSERT INTO TruthGroup VALUES
    (4, 8),
    (4, 7),
    (1, 6),
    (5, 2),
    (2, 4),
    (2, 3),
    (2, 1),
    (9, 1),
    (8, 1),
    (7, 1);
