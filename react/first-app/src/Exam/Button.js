import PropTypes from 'prop-types';
export default function Button({ color, text, onClick }) {    
    return (
        <button onClick={onClick} className={color}>{text}</button>
    );
}
Button.propTypes = {
    text: PropTypes.string
}
Button.defaultProps = {
    text: 'btn'
} 