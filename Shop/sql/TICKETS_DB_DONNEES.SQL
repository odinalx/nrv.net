\c tickets_db 


CREATE TABLE tickets (
    id_ticket SERIAL PRIMARY KEY,  
    user_id INT, 
    soiree_id INT, 
    ticket_type VARCHAR(10) CHECK (ticket_type IN ('NORMAL', 'REDUCED')),
    purchase_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (soiree_id) REFERENCES soirees(id_soiree)
);


INSERT INTO tickets (user_id, soiree_id, ticket_type) 
VALUES 
(1, 1, 'NORMAL'),
(1, 2, 'REDUCED'),
(2, 3, 'NORMAL'),
(2, 4, 'REDUCED'),
(3, 5, 'NORMAL'),
(4, 6, 'REDUCED'),
(5, 7, 'NORMAL'),
(6, 8, 'REDUCED'),
(7, 9, 'NORMAL'),
(8, 10, 'REDUCED');
