<?php 
    $db=sqlite_open("bookshop.db");

    @sqlite_query($db, "DROP TABLE Admin");
    @sqlite_query($db, "DROP TABLE Category");
    @sqlite_query($db, "DROP TABLE Book");

    sqlite_query($db,"CREATE TABLE Admin (
        adminId integer PRIMARY KEY, 
        username TEXT, 
        password TEXT
    )", $sqliteerror);

    sqlite_query($db,"INSERT INTO Admin (username, password) VALUES('admin', 'password')");

    sqlite_query($db,"CREATE TABLE Category (
        categoryId integer PRIMARY KEY, 
        title TEXT
    )", $sqliteerror);

    sqlite_query($db,"INSERT INTO Category (title) VALUES ('The PHP Programming Series')");
    sqlite_query($db,"INSERT INTO Category (title) VALUES ('TCP-IP for Beginners Series')");
    sqlite_query($db,"INSERT INTO Category (title) VALUES ('Client Side Programming Series')");
    sqlite_query($db,"INSERT INTO Category (title) VALUES ('The Web Design Series an HCI focus')");

    sqlite_query($db,"CREATE TABLE Book (
        bookId integer PRIMARY KEY, 
        title TEXT,
        author TEXT,
        coverImage TEXT,
        coverImageCredit TEXT,
        ISBN TEXT,
        publisher TEXT,
        published DATE,
        synopsis TEXT,
        categoryId INTEGER  NOT NULL,
        FOREIGN KEY(categoryId) REFERENCES Category
    )", $sqliteerror);  
    
    sqlite_query($db,"INSERT INTO Book (title, author, coverImage, coverImageCredit,  ISBN, publisher, published, synopsis, categoryId) VALUES(
        'A Project Guide to UX Design: For user experience designers in the field or in the making', 
        'Russ Unger',
        'https://images-na.ssl-images-amazon.com/images/I/414W43nzOUL._SX388_BO1,204,203,200_.jpg',
        'https://www.amazon.co.uk/Project-Guide-Design-experience-designers/dp/0321815386/ref=pd_sbs_14_3?_encoding=UTF8&pd_rd_i=0321815386&pd_rd_r=7b26ddb7-05fd-11e9-8210-ed08ba772cb1&pd_rd_w=5DJZl&pd_rd_wg=Bvm5B&pf_rd_p=18edf98b-139a-41ee-bb40-d725dd59d1d3&pf_rd_r=WQ944VCKF2YR9SA2VWX4&psc=1&refRID=WQ944VCKF2YR9SA2VWX4',
        '0321815386',
        'New Riders', 
        '2012-03-09',
        'User experience design is the discipline of creating a useful and usable Web site or application that&rsquo;s easily navigated and meets the needs of the site owner and its users. There&rsquo;s a lot more to successful UX design than knowing the latest Web technologies or design trends: It takes diplomacy, management skills, and business savvy. That&rsquo;s where the updated edition of this important book comes in. With new information on design principles, mobile and gestural interactions, content strategy, remote research tools and more.',
        4)");

    sqlite_query($db,"INSERT INTO Book (title, author, coverImage, coverImageCredit,  ISBN, publisher, published, synopsis, categoryId) VALUES(
        'Designing User Experience: A guide to HCI, UX and interaction design', 
        'Prof David Benyon',
        'https://images-na.ssl-images-amazon.com/images/I/51w0VM035jL._SX366_BO1,204,203,200_.jpg',
        'https://www.amazon.co.uk/Designing-User-Experience-interaction-design/dp/1292155515/ref=sr_1_1?s=books&ie=UTF8&qid=1545491949&sr=1-1&keywords=HCI+web+design',
        '1292155515',
        'Pearson', 
        '2009-12-11',
        'Designing User Experience presents a comprehensive introduction to the practical issue of creating interactive systems, services and products from a human-centred perspective. It develops the principles and methods of human&ndash;computer interaction (HCI) and Interaction Design (ID) to deal with the design of twenty-first-century computing and the demands for improved user experience (UX). It brings together the key theoretical foundations of human experiences when people interact with and through technologies. It explores UX in a wide variety of environments and contexts.',
        4)");

    sqlite_query($db,"INSERT INTO Book (title, author, coverImage, coverImageCredit,  ISBN, publisher, published, synopsis, categoryId) VALUES(
        'Human-Computer Interaction', 
        'Alan Dix',
        'https://images-na.ssl-images-amazon.com/images/I/617J74145FL._SX398_BO1,204,203,200_.jpg',
        'https://www.amazon.co.uk/Human-Computer-Interaction-Alan-Dix/dp/0130461091/ref=pd_sbs_14_10?_encoding=UTF8&pd_rd_i=0130461091&pd_rd_r=f1836b9e-05fc-11e9-b808-fdb51f2211df&pd_rd_w=BesFV&pd_rd_wg=kdl3c&pf_rd_p=18edf98b-139a-41ee-bb40-d725dd59d1d3&pf_rd_r=N2XHJVM7SPBX9C6K28W2&psc=1&refRID=N2XHJVM7SPBX9C6K28W2n',
        '9780130461',
        'Prentice Hall', 
        '2003-09-30',
        'The second edition of Human-Computer Interaction established itself as one of the classic textbooks in the area, with its broad coverage and rigorous approach, this new edition builds on the existing strengths of the book, but giving the text a more student-friendly slant and improving the coverage in certain areas. The revised structure, separating out the introductory and more advanced material will make it easier to use the book on a variety of courses. This new edition now includes chapters on Interaction Design, Universal Access and Rich Interaction, as well as covering the latest developments in ubiquitous computing and Web technologies, making it the ideal text to provide a grounding in HCI theory and practice.',
        4)");

    sqlite_query($db,"INSERT INTO Book (title, author, coverImage, coverImageCredit,  ISBN, publisher, published, synopsis, categoryId) VALUES(
        'Mindful Design: How and Why to Make Design Decisions for the Good of Those Using Your Product', 
        'Scott Riley',
        'https://images-na.ssl-images-amazon.com/images/I/41XXb5OOWiL._SX348_BO1,204,203,200_.jpg',
        'https://www.amazon.co.uk/Mindful-Design-Decisions-Those-Product/dp/1484242335/ref=sr_1_5?s=books&ie=UTF8&qid=1545492386&sr=1-5&keywords=web+design',
        '1484242335',
        'Apress', 
        '2019-02-04',
        'Learn to create seamless designs backed by a responsible understanding of the human mind. This book examines how human behavior can be used to integrate your product design into lifestyle, rather than interrupt it, and make decisions for the good of those that are using your product. Mindful Design introduces the areas of brain science that matter to designers, and passionately explains how those areas affect each human&#039;s day-to-day experiences with products and interfaces. You will learn about the neurological aspects and limitations of human vision and perception; about our attachment to harmony and dissonance, such as visual harmony, musical harmony; and about our brain&#039;s propensity towards pattern recognition and how we perceive the world cognitively.',
        4)");

    sqlite_query($db,"INSERT INTO Book (title, author, coverImage, coverImageCredit,  ISBN, publisher, published, synopsis, categoryId) VALUES(
        'User Experience Design: A Practical Introduction (Basics Design)', 
        'Gavin Allanwood',
        'https://images-na.ssl-images-amazon.com/images/I/41ukL8etxsL._SX340_BO1,204,203,200_.jpg',
        'https://www.amazon.co.uk/User-Experience-Design-Practical-Introduction/dp/1350021709/ref=sr_1_17?s=books&ie=UTF8&qid=1545492170&sr=1-17&keywords=web+design+HCI',
        '1350021709',
        'Bloomsbury Visual Arts', 
        '2019-05-16',
        'Applicable to a wide spectrum of design activity, this book offers an ideal first step, clearly explaining fundamental concepts and methods to apply when designing for the user experience. Covering essential topics from user research and experience design to aesthetics, standards and prototyping, User Experience Design explains why user-centered methods are now essential to ensuring the success of a wide range of design projects. This second edition includes important new topics including; digital service standards, onboarding and scenario mapping. There are now 12 hands-on activities designed to help you start exploring basic UX tasks such as visualising the user journey and recognising user interface patterns.',
        4)");

    sqlite_query($db,"INSERT INTO Book (title, author, coverImage, coverImageCredit,  ISBN, publisher, published, synopsis, categoryId) VALUES(
        'Eloquent Javascript, 3rd Edition: A Modern Introduction to Programming', 
        'Marijn Haverbeke',
        'https://images-na.ssl-images-amazon.com/images/I/51I9naPg55L._SX376_BO1,204,203,200_.jpg',
        'https://www.amazon.co.uk/Eloquent-Javascript-3rd-Introduction-Programming/dp/1593279507/ref=pd_sbs_14_7?_encoding=UTF8&pd_rd_i=1593279507&pd_rd_r=f7588568-05f9-11e9-9526-c700fc7563af&pd_rd_w=awnXH&pd_rd_wg=FehqR&pf_rd_p=18edf98b-139a-41ee-bb40-d725dd59d1d3&pf_rd_r=6ADCRBNVHMBK0S6QANH6&psc=1&refRID=6ADCRBNVHMBK0S6QANH6',
        '1593279507',
        'No Starch Press', 
        '2018-12-14',
        'Completely revised and updated, this best-selling introduction to programming in JavaScript focuses on writing real applications. JavaScript lies at the heart of almost every modern web application, from social apps like Twitter to browser-based game frameworks like Phaser and Babylon. Though simple for beginners to pick up and play with, JavaScript is a flexible, complex language that you can use to build full-scale applications. This much anticipated and thoroughly revised third edition of Eloquent JavaScript dives deep into the JavaScript language to show you how to write beautiful, effective code. It has been updated to reflect the current state of Java¬Script and web browsers and includes brand-new material on features like class notation, arrow functions, iterators, async functions, template strings, and block scope. A host of new exercises have also been added to test your skills and keep you on track.',
        3)");

    sqlite_query($db,"INSERT INTO Book (title, author, coverImage, coverImageCredit,  ISBN, publisher, published, synopsis, categoryId) VALUES(
        'JavaScript Patterns', 
        'Stoyan Stefanov',
        'https://images-na.ssl-images-amazon.com/images/I/51%2BSiphz7AL._SX377_BO1,204,203,200_.jpg',
        'https://www.amazon.co.uk/JavaScript-Patterns-Stoyan-Stefanov/dp/0596806752/ref=pd_sim_14_2?_encoding=UTF8&pd_rd_i=0596806752&pd_rd_r=69952c2a-05f9-11e9-aaae-b3d453d76d48&pd_rd_w=9dYoe&pd_rd_wg=9IWVm&pf_rd_p=1e3b4162-429b-4ea8-80b8-75d978d3d89e&pf_rd_r=3C527MGD17Z284A36QFT&psc=1&refRID=3C527MGD17Z284A36QFT',
        '9780596806',
        'O&#039;Reilly Media', 
        '2010-10-01',
        'What&#039;s the best approach for developing an application with JavaScript? This book helps you answer that question with numerous JavaScript coding patterns and best practices. If you&#039;re an experienced developer looking to solve problems related to objects, functions, inheritance, and other language-specific categories, the abstractions and code templates in this guide are ideal&mdash;whether you&#039;re using JavaScript to write a client-side, server-side, or desktop application.',
        3)");

    sqlite_query($db,"INSERT INTO Book (title, author, coverImage, coverImageCredit,  ISBN, publisher, published, synopsis, categoryId) VALUES(
        'JavaScript and JQuery: Interactive Front-End Web Development', 
        'Jon Duckett',
        'https://images-na.ssl-images-amazon.com/images/I/41y31M-zcgL._SX400_BO1,204,203,200_.jpg',
        'https://www.amazon.co.uk/JavaScript-JQuery-Interactive-Front-End-Development/dp/1118531647/ref=pd_sbs_14_7?_encoding=UTF8&pd_rd_i=1118531647&pd_rd_r=b0bbe4d4-05f9-11e9-9526-c700fc7563af&pd_rd_w=ryTuK&pd_rd_wg=HrXuK&pf_rd_p=18edf98b-139a-41ee-bb40-d725dd59d1d3&pf_rd_r=NZKV3G5H4SMEPWY78JJF&psc=1&refRID=NZKV3G5H4SMEPWY78JJF',
        '9781118531',
        'John Wiley &amp; Sons', 
        '2014-07-18',
        'Learn JavaScript and jQuery a nicer way This full-color book adopts a visual approach to teaching JavaScript &amp; jQuery, showing you how to make web pages more interactive and interfaces more intuitive through the use of inspiring code examples, infographics, and photography. The content assumes no previous programming experience, other than knowing how to create a basic web page in HTML &amp; CSS. You&#039;ll learn how to achieve techniques seen on many popular websites (such as adding animation, tabbed panels, content sliders, form validation, interactive galleries, and sorting data).',
        3)");

    sqlite_query($db,"INSERT INTO Book (title, author, coverImage, coverImageCredit,  ISBN, publisher, published, synopsis, categoryId) VALUES(
        'Knockout.js: Building Dynamic Client-Side Web Applications', 
        'Jamie Munro',
        'https://images-na.ssl-images-amazon.com/images/I/51EztfqTc1L._SX381_BO1,204,203,200_.jpg',
        'https://www.amazon.co.uk/Knockout-js-Building-Dynamic-Client-Side-Applications/dp/1491914319/ref=sr_1_8?s=books&ie=UTF8&qid=1545490396&sr=1-8&keywords=client+side+programming',
        '1491914319',
        'O&#039;Reilly Media', 
        '2015-01-03',
        'Use Knockout.js to design and build dynamic client-side web applications that are extremely responsive and easy to maintain. This example-driven book shows you how to use this lightweight JavaScript framework and its Model-View-ViewModel (MVVM) pattern. You&rsquo;ll learn how to build your own data bindings, extend the framework with reusable functions, and work with a server to enhance your client-side application with persistence. In the final chapter, you&rsquo;ll build a shopping cart to see how everything fits together.',
        3)");

    sqlite_query($db,"INSERT INTO Book (title, author, coverImage, coverImageCredit,  ISBN, publisher, published, synopsis, categoryId) VALUES(
        'You Don&#039;t Know JS: Up &amp; Going', 
        'Kyle Simpson',
        'https://images-na.ssl-images-amazon.com/images/I/41FhogvNebL._SX331_BO1,204,203,200_.jpg',
        'https://www.amazon.co.uk/You-Dont-Know-JS-Going/dp/1491924462/ref=pd_sbs_14_2?_encoding=UTF8&pd_rd_i=1491924462&pd_rd_r=38bfd65f-05fa-11e9-affa-d7b31a327df4&pd_rd_w=0gJjl&pd_rd_wg=iWF4S&pf_rd_p=18edf98b-139a-41ee-bb40-d725dd59d1d3&pf_rd_r=8SCQXWB6NM9M7SXGC5MN&psc=1&refRID=8SCQXWB6NM9M7SXGC5MN',
        '7814919334',
        'O&#039;Reilly Media', 
        '2015-04-10',
        'It&rsquo;s easy to learn parts of JavaScript, but much harder to learn it completely&mdash;or even sufficiently&mdash;whether you&rsquo;re new to the language or have used it for years. With the &quot;You Don&rsquo;t Know JS&quot; book series, you&rsquo;ll get a more complete understanding of JavaScript, including trickier parts of the language that many experienced JavaScript programmers simply avoid. The series&rsquo; first book, Up &amp; Going, provides the necessary background for those of you with limited programming experience. By learning the basic building blocks of programming, as well as JavaScript&rsquo;s core mechanisms, you&rsquo;ll be prepared to dive into the other, more in-depth books in the series&mdash;and be well on your way toward true JavaScript.in-depth books in the series&mdash;and be well on your way toward true JavaScript.',
        3)");

    sqlite_query($db,"INSERT INTO Book (title, author, coverImage, coverImageCredit,  ISBN, publisher, published, synopsis, categoryId) VALUES(
        'Routing TCP/IP, Volume 1: v. 1 (CCIE Professional Development Routing TCP/IP)', 
        'Jeff Doyle',
        'https://images-na.ssl-images-amazon.com/images/I/41bFxCG4zzL._SX392_BO1,204,203,200_.jpg',
        'https://www.amazon.co.uk/Routing-TCP-IP-Professional-Development/dp/1587052024/ref=sr_1_7?s=books&ie=UTF8&qid=1545316381&sr=1-7&keywords=tcp+ip',
        '8131700429',
        'Cisco Press', 
        '2005-10-19',
        'A detailed examination of interior routing protocols -- completely updated in a new edition A complete revision of the best-selling first edition--widely considered a premier text on TCP/IP routing protocols A core textbook for CCIE preparation and a practical reference for network designers, administrators, and engineers. Includes configuration and troubleshooting lessons that would cost thousands to learn in a classroom and numerous real-world examples and case studies. Praised in its first edition for its approachable style and wealth of information, this new edition provides readers a deep understanding of IP routing protocols, teaches how to implement these protocols using Cisco routers, and brings readers up to date protocol and implementation enhancements.',
        2)");

    sqlite_query($db,"INSERT INTO Book (title, author, coverImage, coverImageCredit,  ISBN, publisher, published, synopsis, categoryId) VALUES(
        'TCP/IP Guide: A Comprehensive, Illustrated Internet Protocols Reference', 
        'Charles M. Kozierok',
        'https://images-na.ssl-images-amazon.com/images/I/516%2BhGptmNL._SX376_BO1,204,203,200_.jpg',
        'https://www.amazon.co.uk/TCP-Guide-Comprehensive-Illustrated-Protocols/dp/159327047X/ref=sr_1_1?s=books&ie=UTF8&qid=1545316282&sr=1-1&keywords=tcp+ip',
        '159327047X',
        'No Starch Press', 
        '2005-10-14',
        'The TCP/IP Guide is both an encyclopedic and comprehensible guide to the TCP/IP protocol suite that will appeal to newcomers and the seasoned professional. It details the core protocols that make TCP/IP internetworks function, and the most important classical TCP/IP applications. Its personal, easy-going writing style lets anyone understand the dozens of protocols and technologies that run the Internet, with full coverage of PPP, ARP, IP, IPv6, IP NAT, IPSec, Mobile IP, ICMP, RIP, BGP, TCP, UDP, DNS, DHCP, SNMP, FTP, SMTP, NNTP, HTTP, Telnet and much more. The author offers not only a detailed view of the TCP/IP protocol suite, but also describes networking fundamentals and the important OSI Reference Model.',
        2)");

    sqlite_query($db,"INSERT INTO Book (title, author, coverImage, coverImageCredit,  ISBN, publisher, published, synopsis, categoryId) VALUES(
        'TCP/IP Illustrated, Volume 1: The Protocols: The Protocols v. 1', 
        'Kevin R. Fall',
        'https://images-na.ssl-images-amazon.com/images/I/51G-AM5VWwL._SX359_BO1,204,203,200_.jpg',
        'https://www.amazon.co.uk/TCP-Illustrated-Protocols-Addison-Wesley-Professional/dp/0321336313/ref=sr_1_2?s=books&ie=UTF8&qid=1545316381&sr=1-2&keywords=tcp+ip',
        '0321336313',
        'Addison Wesley', 
        '2007-11-15',
        '&quot;For an engineer determined to refine and secure Internet operation or to explore alternative solutions to persistent problems, the insights provided by this book will be invaluable.&quot; Vint Cerf, Internet pioneer. TCP/IP Illustrated, Volume 1, Second Edition, is a detailed and visual guide to today&#039;s TCP/IP protocol suite. Fully updated for the newest innovations, it demonstrates each protocol in action through realistic examples from modern Linux, Windows, and Mac OS environments. There&#039;s no better way to discover why TCP/IP works as it does, how it reacts to common conditions, and how to apply it in your own applications and networks.',
        2)");

    sqlite_query($db,"INSERT INTO Book (title, author, coverImage, coverImageCredit,  ISBN, publisher, published, synopsis, categoryId) VALUES(
        'TCP/IP Network Administration', 
        'Craig Hunt',
        'https://images-na.ssl-images-amazon.com/images/I/51vQlOHqoUL._SX359_BO1,204,203,200_.jpg',
        'https://www.amazon.co.uk/TCP-Network-Administration-Craig-Hunt/dp/0596002971/ref=sr_1_5?s=books&ie=UTF8&qid=1545316381&sr=1-5&keywords=tcp+ip',
        '9780596002',
        'O&#039;Reilly Media', 
        '1004-04-14',
        'This complete guide to setting up and running a TCP/IP network is essential for network administrators, and invaluable for users of home systems that access the Internet. The book starts with the fundamentals -- what protocols do and how they work, how addresses and routing are used to move data through the network, how to set up your network connection -- and then covers, in detail, everything you need to know to exchange information via the Internet.',
        2)");

    sqlite_query($db,"INSERT INTO Book (title, author, coverImage, coverImageCredit,  ISBN, publisher, published, synopsis, categoryId) VALUES(
        'TCP/IP in 24 Hours, Sams Teach Yourself', 
        'Joe Casad',
        'https://images-na.ssl-images-amazon.com/images/I/411akaJDgyL._SX381_BO1,204,203,200_.jpg',
        'https://www.amazon.co.uk/TCP-Hours-Sams-Teach-Yourself/dp/0672337894/ref=sr_1_3?s=books&ie=UTF8&qid=1545316381&sr=1-3&keywords=tcp+ip',
        '0672337894',
        'Sams', 
        '2017-02-08',
        'Sams Teach Yourself TCP/IP in 24 Hours, Sixth Edition is a practical guide to the simple yet illusive protocol system that powers the Internet. A step-by-step approach reveals how the protocols of the TCP/IP stack really work and explores the rich array of services available on the Internet today. You&rsquo;ll learn about configuring and managing real-world networks, and you&rsquo;ll gain the deep understanding you&rsquo;ll need to troubleshoot new problems when they arise. Sams Teach Yourself TCP/IP in 24 Hours is the only single-volume introduction to TCP/IP that receives regular updates to incorporate new technologies of the ever-changing Internet. This latest edition includes up-to-date material on recent topics such as tracking and privacy, cloud computing, mobile networks, and the Internet of Things.',
        2)");

    sqlite_query($db,"INSERT INTO Book (title, author, coverImage, coverImageCredit,  ISBN, publisher, published, synopsis, categoryId) VALUES(
        'Learning PHP, MySQL &amp; JavaScript 5e (Learning PHP, MYSQL, Javascript, CSS &amp; HTML5)', 
        'Robin Nixon',
        'https://images-na.ssl-images-amazon.com/images/I/51aUTzDIxxL._SX379_BO1,204,203,200_.jpg',
        'https://www.amazon.co.uk/Learning-MySQL-JavaScript-MYSQL-Javascript/dp/1491978910/ref=sr_1_1?s=books&ie=UTF8&qid=1545313183&sr=1-1&keywords=php',
        '1491978910',
        'O&#039;Reilly', 
        '2018-06-08',
        'Build interactive, data-driven websites with the potent combination of open-source technologies and web standards, even if you only have basic HTML knowledge. With this popular hands-on guide, you ll tackle dynamic web programming with the help of today s core technologies: PHP, MySQL, JavaScript, CSS, HTML5, and jQuery libraries of ready-made functions to significantly enhance your projects.',
        1)");

    sqlite_query($db,"INSERT INTO Book (title, author, coverImage, coverImageCredit,  ISBN, publisher, published, synopsis, categoryId) VALUES(
        'PHP &amp; MySQL: Server-side Web Development', 
        'Jon Duckett',
        'https://images-na.ssl-images-amazon.com/images/I/31tYCd%2BGxIL._SX390_BO1,204,203,200_.jpg',
        'https://www.amazon.co.uk/PHP-MySQL-Server-side-Web-Development/dp/1119149223/ref=sr_1_4?s=books&ie=UTF8&qid=1545313317&sr=1-4&keywords=php',
        '1119149223',
        'John Wiley &amp; Sons', 
        '2019-03-20',
        'Learn PHP, the programming language used to build sites like Facebook, Wikipedia and WordPress, then discover how these sites store information in a database (MySQL) and use the database to create the web pages. This full-color book is packed with inspiring code examples, infographics and photography that not only teach you the PHP language and how to work with databases, but also show you how to build new applications from scratch. It demonstrates practical techniques that you will recognize from popular sites.',
        1)");

    sqlite_query($db,"INSERT INTO Book (title, author, coverImage, coverImageCredit,  ISBN, publisher, published, synopsis, categoryId) VALUES(
        'PHP 7 in easy steps', 
        'Mike McGrath',
        'https://images-na.ssl-images-amazon.com/images/I/51TgRKFPg2L._SX408_BO1,204,203,200_.jpg',
        'https://www.amazon.co.uk/PHP-easy-steps-Mike-McGrath/dp/184078718X/ref=sr_1_5?s=books&ie=UTF8&qid=1545313317&sr=1-5&keywords=php',
        '184078718X',
        'In Easy Steps Limited', 
        '2018-07-31',
        'PHP 7 in easy steps will teach you to code server-side scripts, and demonstrates every aspect of the language you will need to produce professional web programming results. Its examples provide clear syntax-highlighted code showing PHP language basics including variables, arrays, logic, looping, functions, and classes.',
        1)");

    sqlite_query($db,"INSERT INTO Book (title, author, coverImage, coverImageCredit,  ISBN, publisher, published, synopsis, categoryId) VALUES(
        'PHP and MySQL for Dynamic Web Sites: Visual QuickPro Guide (Visual QuickPro Guides)', 
        'Larry Ullman',
        'https://images-na.ssl-images-amazon.com/images/I/51ywj144QsL._SX390_BO1,204,203,200_.jpg',
        'https://www.amazon.co.uk/PHP-MySQL-Dynamic-Web-Sites/dp/0134301846/ref=sr_1_3?s=books&ie=UTF8&qid=1545313317&sr=1-3&keywords=php',
        '0134301846',
        'Peachpit Press', 
        '2017-11-20',
        'When it comes to creating dynamic, database-driven Web sites, the PHP language and MySQL database offer a winning combination -- and with PHP 7, web professionals can achieve dramatic performance improvements. Combine these great open source technologies with Larry Ullman&#039;s PHP and MySQL for Dynamic Web Sites: Visual QuickPro Guide, Fifth Edition, and there&#039;s no limit to the powerful, interactive Web sites you can create.',
        1)");

    sqlite_query($db,"INSERT INTO Book (title, author, coverImage, coverImageCredit,  ISBN, publisher, published, synopsis, categoryId) VALUES(
        'PHP, MySQL, &amp; JavaScript All-in-One For Dummies', 
        'Richard Blum',
        'https://images-na.ssl-images-amazon.com/images/I/51206bHy2XL._SX397_BO1,204,203,200_.jpg',
        'https://www.amazon.co.uk/MySQL-JavaScript-All-Dummies-Computer/dp/1119468388/ref=sr_1_8?s=books&ie=UTF8&qid=1545313317&sr=1-8&keywords=php',
        '0134301846',
        'John Wiley &amp; Sons', 
        '2018-12-20',
        'It takes a powerful suite of technologies to drive the most-visited websites in the world. PHP, mySQL, JavaScript, and other web-building languages serve as the foundation for application development and programming projects at all levels of the web. Dig into this all-in-one book to get a grasp on these in-demand skills, and figure out how to apply them to become a professional web builder. You&#039;ll get valuable information from seven handy books covering the pieces of web programming, HTML5 &amp; CSS3, JavaScript, PHP, MySQL, creating object-oriented programs, and using PHP frameworks.',
        1)");

	sqlite_close($db);
?>


