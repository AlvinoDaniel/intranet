document.addEventListener('alpine:init', async () => {
    Alpine.data('info', () => ({
        carga: {},
        PARENTESCO: {
            'H': 'Hijo(a)',	
            'E': 'Hermano(a)',	
            'C': 'Esposo(a)',	
            'A': 'Abuelo(a)',	
            'P': 'Padres', 
        },
        ASEXO:{
            'M': 'Masculino',
	        'F': 'Femenino',
        },
        async init(){
            // this.$store.app.toggleLoading(true)
            try {
                const data = await fetch('http://10.5.0.98/intranet/front-intranet/API/cargaFamiliar.php')
                if(!data.ok){
                    throw new Error('ERROR EN INFO FUNCIONARIO')
                }
                const info = await data.json()
                this.carga = info ?? null               
            
            } catch (error) {
                console.log({error})
            } 
            // this.$store.app.toggleLoading(false)
        }
    })
    );
    
})
