CREATE DATABASE IF NOT EXISTS PokemonDB;
USE PokemonDB;

CREATE TABLE IF NOT EXISTS pokemon (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_identificador INT NOT NULL UNIQUE, 
    imagen VARCHAR(255) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    tipo ENUM('fuego', 'agua', 'hierba', 'electrico'),
    descripcion TEXT
);


INSERT INTO pokemon (numero_identificador, imagen, nombre, tipo, descripcion)
VALUES
    (1, 'Bulbasaur.jpg', 'Bulbasaur', 'hierba', 'Bulbasaur es un Pokémon de tipo hierba/veneno conocido por su capacidad para absorber energía solar y lanzar ataques de tipo planta. Tiene una planta en la espalda.'),
    (2, 'Ivysaur.jpg', 'Ivysaur', 'hierba', 'Ivysaur es la evolución de Bulbasaur. La planta en su espalda comienza a crecer y le permite atacar con más fuerza.'),
    (3, 'Venusaur.jpg', 'Venusaur', 'hierba', 'Venusaur es la evolución final de Bulbasaur. Su planta es completamente madura, lo que le permite utilizar poderosos ataques de tipo planta.'),
    (4, 'Charmander.jpg', 'Charmander', 'fuego', 'Charmander es un Pokémon de tipo fuego conocido por la llama en la punta de su cola. La llama indica su salud y se intensifica con la emoción.'),
    (5, 'Charmeleon.jpg', 'Charmeleon', 'fuego', 'Charmeleon es la evolución de Charmander. Se vuelve más agresivo y puede controlar mejor sus llamas para atacar.'),
    (6, 'Charizard.jpg', 'Charizard', 'fuego', 'Charizard es la evolución final de Charmander. Puede volar y lanzar llamas intensas. Es uno de los Pokémon más icónicos.'),
    (7, 'Squirtle.jpg', 'Squirtle', 'agua', 'Squirtle es un Pokémon de tipo agua con una concha dura para protección. Puede lanzar chorros de agua para atacar a sus oponentes.'),
    (8, 'Wartortle.jpg', 'Wartortle', 'agua', 'Wartortle es la evolución de Squirtle. Es más grande y fuerte, con orejas y cola cubiertas de pelusa.'),
    (9, 'Blastoise.jpg', 'Blastoise', 'agua', 'Blastoise es la evolución final de Squirtle. Tiene dos poderosos cañones de agua en su concha para lanzar ataques de agua.'),
    (10, 'Pikachu.jpg', 'Pikachu', 'electrico', 'Pikachu es un Pokémon de tipo eléctrico conocido por sus mejillas cargadas de electricidad. Puede lanzar potentes descargas eléctricas.'),
    (11, 'Raichu.jpg', 'Raichu', 'electrico', 'Raichu es la evolución de Pikachu. Es más grande y tiene una mayor capacidad para almacenar y liberar energía eléctrica.'),
    (12, 'Magnemite.jpg', 'Magnemite', 'electrico', 'Magnemite es un Pokémon de tipo eléctrico/acero con forma de imán. Puede levitar y utilizar ataques eléctricos.'),
    (13, 'Magneton.jpg', 'Magneton', 'electrico', 'Magneton es la evolución de Magnemite. Consiste en tres Magnemite fusionados, lo que le permite tener mayor poder de ataque eléctrico.'),
    (14, 'Oddish.jpg', 'Oddish', 'hierba', 'Oddish es un Pokémon de tipo hierba/veneno. Tiene hojas verdes que le permiten moverse sigilosamente en la oscuridad.'),
    (15, 'Gloom.jpg', 'Gloom', 'hierba', 'Gloom es la evolución de Oddish. Libera un olor desagradable cuando se siente amenazado. Puede paralizar a sus enemigos.');
