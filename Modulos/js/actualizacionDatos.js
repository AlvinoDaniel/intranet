
notificacion = (msg) => {
    const toast = window.Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000,
        showCloseButton: true,
        customClass: {
            popup: 'color-danger',
        },
    });
    toast.fire({
        title: msg,
    });
}
document.addEventListener('alpine:init', async () => {
    Alpine.data('actualizacion', () => ({
        loading: false,
        async saveData(){
            const $ = document.querySelector
            console.log(document.getElementById("cedula").value)
            const datos = {
                cedula: document.getElementById("cedula").value,
                zona: document.getElementById("zona").value,
                calle: document.getElementById("calle").value,
                edificio: document.getElementById("edificio").value,
                apto: document.getElementById("apto").value,
                email: document.getElementById("email").value,
                telefono_personal: document.getElementById("telefono_personal").value,
                telefono_oficina: document.getElementById("telefono_oficina").value,
            }
            this.loading = true
            new window.Swal({
                icon: 'success',
                title: 'Actualización Exitosa',
                text: 'Se ha actualizados sus datos personales exitosamente.',
                padding: '2em',
                customClass: 'sweet-alerts',
            });
            try {
                const data = await fetch('http://10.5.0.98/intranet/personal/actualizacion/procesa_cesta_ticket.php',{
                  method: 'POST',
                  body: datos,
                  headers: {
                    "Content-Type": "application/json",
                  }
                })
                if(!data.ok){
                    throw new Error('ERROR EN ACTUALIZACION')
                }
                const info = await data.json()
                console.log('PERFIL ACTUALIZADO', info)            
            
            } catch (error) {
                console.log({error})
                // notificacion('Lo sentimos, hubo un error al intentar actualizar.')
            } finally {
                this.loading = false
            }
        }
    })
    );
    
})

