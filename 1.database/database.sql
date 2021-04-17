-- Answers for the test questions :

-- Create new database "tiga_raksa"
CREATE DATABASE tiga_raksa;

-- Create new table "members"
CREATE TABLE members (
    rm_branch_id VARCHAR(4) NOT NULL,
    rm_rep_id VARCHAR(10) NOT NULL UNIQUE,
    rm_name VARCHAR(255) NOT NULL,
    rm_current_position VARCHAR(4) NOT NULL,
    rm_manager_id VARCHAR(10) NOT NULL
);

-- Insert new records
INSERT INTO
    members (rm_branch_id, rm_rep_id, rm_name, rm_current_position, rm_manager_id)
VALUES
    ('BDG', 'BD03177', 'SHINTA DAMAYANTIE', 'EPC', 'JK03320'),
    ('PKB', 'PK00068', 'NIA SEMARTIANA', 'EPC', 'JK03320'),
    ('BKS', 'BK00158', 'FARAH AMALIA', 'EPC', 'BD03143'),
    ('BDG', 'BD03203', 'ROBI ACHIRUDIN.S', 'EPC', 'BD03143'),
    ('JGY', 'JG00928', 'SUSIAMI INDRIANI', 'EPC', 'PL00205'),
    ('MDN', 'MD00464', 'SARAH PAMELA', 'EPC', 'PL00205'),
    ('SBY', 'SB01310', 'HANATRI PUTRI MARATONI', 'EPC', 'SB01153'),
    ('TGR', 'TG00154', 'YANA FEBRINA', 'EPC', 'SB01153'),
    ('JKT', 'JK03320', 'EDO APRIANTO', 'GEPD', 'JK03320'),
    ('BDG', 'BD03143', 'NUR ISLAMI Y LUTHFIATI', 'EPD', 'JK03320'),
    ('PLB', 'PL00205', 'FITRI HANDAYANI', 'EPD', 'JK03320'),
    ('SBY', 'SB01153', 'MARIA LUAILIA', 'GEPD', 'SB01153');
    

-- Query select
SELECT 
	m3.rm_rep_id as rm_mst_gepd, m3.rm_name as NamaGEPD, 
	m2.rm_rep_id as rm_mst_epd, m2.rm_name as NamaEPD, 
	m1.rm_branch_id, m1.rm_name
FROM members as m1
INNER JOIN members as m2 ON m1.rm_manager_id = m2.rm_rep_id
INNER JOIN members as m3 ON m2.rm_manager_id = m3.rm_rep_id
WHERE m1.rm_current_position = 'EPC'
ORDER BY m3.rm_name ASC;

-- Thanks A Lot