CREATE TABLE Citas(
	codCita int AUTO_INCREMENT PRIMARY KEY NOT NULL,
    tipoCita VARCHAR(100) NOT NULL,
    fechaCita DATE NOT NULL,
    horaCita TIME NOT NULL,
    Estado VARCHAR(10) NOT NULL,
    Observaciones VARCHAR(100),
    codConsultorio int NOT NULL,
    codMedico int NOT NULL,
    codPaciente int NOT NULL,
    FOREIGN KEY codConsultorio REFERENCES Consultorios(numeroC),
    FOREIGN KEY codMedico REFERENCES Medicos(documentoM),
    FOREIGN KEY codPaciente REFERENCES Pacientes(documentoP)
);

CREATE TABLE Usuarios(
	idUsuarios int AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nombreU VARCHAR(100) NOT NULL,
    Email DATE NOT NULL,
    Usuario TIME NOT NULL,
    Password VARCHAR(10) NOT NULL,
    Avatar VARCHAR(100),
    created_at datatime
    
);