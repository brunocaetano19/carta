from flask import Flask, render_template, request, jsonify
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql://u800039269_bruno_crea:CVLtr0i4@localhost/u800039269_cartinhanatal'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
db = SQLAlchemy(app)

class Cartinha(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    nome = db.Column(db.String(255), nullable=False)
    telefone = db.Column(db.String(20), nullable=False)
    endereco = db.Column(db.String(255), nullable=False)
    entrega = db.Column(db.Boolean, default=False)

with app.app_context():
    db.create_all()

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/adotar', methods=['POST'])
def adotar():
    try:
        nome = request.form.get('nome')
        telefone = request.form.get('telefone')
        endereco = request.form.get('endereco')
        entrega = 'entrega' in request.form

        nova_cartinha = Cartinha(nome=nome, telefone=telefone, endereco=endereco, entrega=entrega)
        db.session.add(nova_cartinha)
        db.session.commit()

        return jsonify({'success': True, 'message': 'Cartinha adotada com sucesso!'})
    except Exception as e:
        return jsonify({'success': False, 'message': str(e)})

@app.route('/cartinhas', methods=['GET'])
def obter_cartinhas():
    cartinhas = Cartinha.query.all()
    cartinhas_data = [{'nome': c.nome, 'telefone': c.telefone, 'endereco': c.endereco, 'entrega': c.entrega} for c in cartinhas]
    return jsonify({'cartinhas': cartinhas_data})

if __name__ == '__main__':
    app.run(debug=True)
