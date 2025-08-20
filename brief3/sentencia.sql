IF EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[informe]') AND type = N'U')
BEGIN
    DROP TABLE [dbo].[informe];
END;
CREATE TABLE [dbo].[informe](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[created_at] [datetime] NULL,
	[turno] [varchar](10) NOT NULL,
	[area_servicio] [varchar](255) NULL,
	[quien_registra] [varchar](255) NULL,
	[personal1] [varchar](255) NULL,
	[observacion1] [varchar](255) NULL,
	[personal2] [varchar](255) NULL,
	[observacion2] [varchar](255) NULL,
	[personal3] [varchar](255) NULL,
	[observacion3] [varchar](255) NULL,
	[personal4] [varchar](255) NULL,
	[observacion4] [varchar](255) NULL,
	[personal5] [varchar](255) NULL,
	[observacion5] [varchar](255) NULL,
	[personal6] [varchar](255) NULL,
	[observacion6] [varchar](255) NULL,
	[personal7] [varchar](255) NULL,
	[observacion7] [varchar](255) NULL,
	[personal8] [varchar](255) NULL,
	[observacion8] [varchar](255) NULL,
	[personal9] [varchar](255) NULL,
	[observacion9] [varchar](255) NULL,
	[carro] [varchar](255) NULL,
	[observacionescarro] [varchar](255) NULL,
	[equipo] [varchar](255) NULL,
	[observacionesequipo] [varchar](255) NULL,
	[insumos] [varchar](255) NULL,
	[observacionesinsumos] [varchar](255) NULL,
	[lider] [varchar](255) NULL,
	[via] [varchar](255) NULL,
	[admin_medi] [varchar](255) NULL,
	[compre] [varchar](255) NULL,
	[circu] [varchar](255) NULL
	[personal10] [varchar](255) NULL,   // CAMPOS NUVEOS
	[observacion10] [varchar](255) NULL,// CAMPOS NUVEOS
	[personal11] [varchar](255) NULL,// CAMPOS NUVEOS
	[observacion11] [varchar](255) NULL,// CAMPOS NUVEOS
);