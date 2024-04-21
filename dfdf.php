CREATE TABLE clients (
    id INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(50) NOT NULL,
    company VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    URL VARCHAR(255),
    city VARCHAR(50),
    state VARCHAR(50),
    best_way_contact ENUM('By Phone', 'By Email'),
    web_design SET('Site Design', 'Redesign', 'Online Store', 'Marketing', 'Maintenance'),
    programming SET('HTML/DHTML', 'CGI/PERL/C/C++', 'Java', 'ASP', 'XML'),
    database_services SET('Access', 'SQL', 'Sybase', 'Oracle'),
    multimedia SET('Flash', 'Quicktime', 'Media Player', 'Real'),
    corporate_design SET('Marketing Collateral', 'Logos', 'Packaging', 'Annual Reports'),
    other varchar(255),
    comments varchar(255)
);