
CREATE DATABASE tickets_db;
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

