-- Create the clients table
CREATE TABLE clients (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20) NULL,
    address VARCHAR(200) NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Insert 5 dummy clients
INSERT INTO clients (name, email, phone, address)
VALUES 
    ('John Doe', 'john.doe@example.com', '+1234567890', '123 Main St, New York, USA'),
    ('Jane Smith', 'jane.smith@example.com', '+1987654321', '456 Oak Ave, Los Angeles, USA'),
    ('Robert Johnson', 'robert.j@example.com', '+1122334455', '789 Pine Rd, Chicago, USA'),
    ('Emily Davis', 'emily.davis@example.com', '+1555666777', '321 Elm Blvd, Houston, USA'),
    ('Michael Wilson', 'michael.w@example.com', '+1444333222', '654 Maple Ln, Phoenix, USA');