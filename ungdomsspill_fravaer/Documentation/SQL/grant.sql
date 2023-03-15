CREATE USER 'faadatafraidag'@'localhost' IDENTIFIED BY 'JegFaaDataFraIDag';
GRANT SELECT(Datum, id) ON jsg_fravaer.abwesenheiten TO 'faadatafraidag'@'localhost';
GRANT SELECT(Mitglieder_id, Name, Instrument) ON jsg_fravaer.mitglieder TO 'faadatafraidag'@'localhost';
GRANT SELECT(Status, Abwesenheiten_id, user_id) on jsg_fravaer.abwesenheiten_daten TO 'faadatafraidag'@'localhost';

CREATE USER 'login'@'localhost' IDENTIFIED BY 'JegErLogin';
GRANT SELECT(active, login, password) ON jsg_fravaer.login TO 'login'@'localhost';

CREATE USER 'skapmedlem'@'localhost' IDENTIFIED BY 'JegSkapMedlemer';
GRANT SELECT(Name, Instrument) ON jsg_fravaer.mitglieder TO 'skapmedlem'@'localhost';
GRANT INSERT(Name, Instrument) ON jsg_fravaer.mitglieder TO 'skapmedlem'@'localhost';

CREATE USER 'faamedlemer'@'localhost' IDENTIFIED BY 'JegFaaMedlemer';
GRANT SELECT(Mitglieder_id, Name, Instrument) ON jsg_fravaer.mitglieder TO 'faamedlemer'@'localhost';

CREATE USER 'faadata'@'localhost' IDENTIFIED BY 'JegFaaData';
GRANT SELECT(Datum, id) ON jsg_fravaer.abwesenheiten TO 'faadata'@'localhost';
GRANT SELECT(Status, Abwesenheiten_id, user_id) ON jsg_fravaer.abwesenheiten_daten TO 'faadata'@'localhost';
GRANT SELECT(Name, Mitglieder_id) ON jsg_fravaer.mitglieder TO 'faadata'@'localhost';

CREATE USER 'submittodb'@'localhost' IDENTIFIED BY 'JegSubmitToDb';
GRANT SELECT(id, Datum) ON jsg_fravaer.abwesenheiten TO 'submittodb'@'localhost';
GRANT INSERT(Datum) ON jsg_fravaer.abwesenheiten TO 'submittodb'@'localhost';
GRANT SELECT(Mitglieder_id, Name, Instrument) ON jsg_fravaer.mitglieder TO 'submittodb'@'localhost';
GRANT INSERT(Abwesenheiten_id, Status, user_id) ON jsg_fravaer.abwesenheiten_daten TO 'submittodb'@'localhost';