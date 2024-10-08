const NIVEL_ACADEMICO = {
    '02': "MEDIA DIVERSIFICADA",
	'03': "PREGRADO",
	'04': "POSTGRADO",
	'05': "INICIAL",
}

const ESTATUS = {
    '1': 'SOLICITUD',
    '2': 'APROBADO',
    '3': 'RECHAZADO',
    '4': 'EN ESTUDIO',
    '5': 'CULMINADO',
}

document.addEventListener('alpine:init', async () => {
    Alpine.data('info', () => ({
        dataLab: {},
        dataAcad: {},
        datosAcademicos: {},
        lengthAcad: null,
        lengthLab: null,
        open: false,
        async init(){
            // this.$store.app.toggleLoading(true)
            try {
                const data = await fetch('http://10.5.0.98/intranet/front-intranet/API/api_persona.php')
                if(!data.ok){
                    throw new Error('ERROR EN INFO FUNCIONARIO')
                }
                const info = await data.json()
                this.dataAcad = info[1] ?? null
                this.dataLab = info[2] ?? null
                this.lengthAcad = Object.values(this.dataAcad).length === 0
                this.lengthLab = Object.values(this.dataLab).length === 0
               
            
            } catch (error) {
                console.log({error})
            } 
            // this.$store.app.toggleLoading(false)
        },
        toggle() {
            this.open = !this.open;
        },
        async getDataAcademica(codigo) {
            this.open = !this.open;
            const params = new URLSearchParams({
                uno: codigo,
                dos: parseInt(codigo) + 138987
            })
            this.datosAcademicos = {}
            try {
                const data = await fetch(`http://10.5.0.98/intranet/front-intranet/API/datosAcademicos.php?${params}`)
                if(!data.ok){
                    throw new Error('ERROR EN DATOS ACADEMICOS  DEL FUNCIONARIO')
                }
                const info = await data.json()
                this.datosAcademicos = {
                        ...info[0],
                        TIPO_NIVEL: NIVEL_ACADEMICO[info[0].TIPO_NIVEL] ?? '',
                        ESTATUS: ESTATUS[info[0].ESTATUS] ?? '',
                        renglon: codigo  
                    }   
                console.log(this.datosAcademicos)   
            } catch (error) {
                console.log({error})
            } 
        },
    })
    );

})